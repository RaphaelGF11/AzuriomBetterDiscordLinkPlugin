@extends('admin.layouts.admin')

@section('title', trans('discord-integration::admin.nav.roles'))

@section('content')
    @if(! $botAvailable)
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> {{ trans('discord-integration::admin.role_sync.bot_unavailable') }}
        </div>
    @else
        @php
            $knownGuildIds = collect($guilds ?? [])->pluck('id');
            $unknownGuildIds = $roleSyncs->pluck('discord_guild_id')->unique()->reject(fn ($id) => $knownGuildIds->contains($id));
        @endphp

        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">{{ trans('discord-integration::admin.role_sync.title') }}</h5>

                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#roleSyncModal">
                    <i class="bi bi-plus-lg"></i> {{ trans('discord-integration::admin.role_sync.create') }}
                </button>
            </div>
            <div class="card-body">
                <p class="text-muted">{{ trans('discord-integration::admin.role_sync.description') }}</p>

                @if($roleSyncs->isEmpty())
                    <p class="text-muted mb-0">{{ trans('discord-integration::admin.role_sync.empty') }}</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>{{ trans('discord-integration::admin.role_sync.guild_id') }}</th>
                                    <th>{{ trans('discord-integration::admin.role_sync.role_id') }}</th>
                                    <th>{{ trans('discord-integration::admin.role_sync.conditions') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roleSyncs as $roleSync)
                                    <tr>
                                        <td>{{ optional(collect($guilds ?? [])->firstWhere('id', $roleSync->discord_guild_id))['name'] ?? $roleSync->discord_guild_id }}</td>
                                        <td><code>{{ $roleSync->discord_role_id }}</code></td>
                                        <td>
                                            <ul class="mb-0 ps-3">
                                                @if($roleSync->site_role_ids)
                                                    <li>{{ trans('discord-integration::admin.role_sync.condition_site_roles', ['roles' => $siteRoles->whereIn('id', $roleSync->site_role_ids)->pluck('name')->join(', ')]) }}</li>
                                                @endif

                                                @if($roleSync->shop_package_id && $shopPackages !== null)
                                                    <li>{{ trans('discord-integration::admin.role_sync.condition_shop_package', ['package' => optional($shopPackages->firstWhere('id', $roleSync->shop_package_id))->name ?? $roleSync->shop_package_id]) }}</li>
                                                @endif

                                                @if($roleSync->balance_min !== null || $roleSync->balance_max !== null)
                                                    <li>{{ trans('discord-integration::admin.role_sync.condition_balance', ['min' => $roleSync->balance_min ?? '-', 'max' => $roleSync->balance_max ?? '-']) }}</li>
                                                @endif

                                                @if(! $roleSync->site_role_ids && ! $roleSync->shop_package_id && $roleSync->balance_min === null && $roleSync->balance_max === null)
                                                    <li class="text-muted">{{ trans('discord-integration::admin.role_sync.no_conditions') }}</li>
                                                @endif
                                            </ul>
                                        </td>
                                        <td class="text-end">
                                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                                    data-bs-toggle="modal" data-bs-target="#roleSyncModal"
                                                    data-id="{{ $roleSync->id }}"
                                                    data-guild-id="{{ $roleSync->discord_guild_id }}"
                                                    data-role-id="{{ $roleSync->discord_role_id }}"
                                                    data-site-role-ids="{{ json_encode($roleSync->site_role_ids ?? []) }}"
                                                    data-shop-package-id="{{ $roleSync->shop_package_id }}"
                                                    data-balance-min="{{ $roleSync->balance_min }}"
                                                    data-balance-max="{{ $roleSync->balance_max }}"
                                                    title="{{ trans('messages.actions.edit') }}">
                                                <i class="bi bi-pencil"></i>
                                            </button>

                                            <form action="{{ route('discord-integration.admin.roles.destroy', $roleSync) }}" method="POST" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-outline-danger" data-confirm="delete" title="{{ trans('messages.actions.remove') }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <div class="modal fade" id="roleSyncModal" tabindex="-1" role="dialog" aria-labelledby="roleSyncModalLabel" aria-modal="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="roleSyncModalLabel">{{ trans('discord-integration::admin.role_sync.create') }}</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('discord-integration.admin.roles.store') }}" id="roleSyncForm">
                            @csrf
                            <input type="hidden" name="_method" id="roleSyncMethod" value="POST">

                            <h6>{{ trans('discord-integration::admin.role_sync.conditions_title') }}</h6>
                            <p class="form-text">{{ trans('discord-integration::admin.role_sync.conditions_help') }}</p>

                            @if($siteRoles->isNotEmpty())
                                <div class="mb-3">
                                    <label class="form-label">{{ trans('discord-integration::admin.role_sync.condition_site_roles_label') }}</label>
                                    <div class="form-text mb-1">{{ trans('discord-integration::admin.role_sync.condition_site_roles_help') }}</div>

                                    @foreach($siteRoles as $role)
                                        <div class="form-check">
                                            <input class="form-check-input role-sync-site-role" type="checkbox" name="site_role_ids[]" value="{{ $role->id }}" id="siteRole{{ $role->id }}">

                                            <label class="form-check-label" for="siteRole{{ $role->id }}">{{ $role->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            @if($shopPackages !== null && $shopPackages->isNotEmpty())
                                <div class="mb-3">
                                    <label class="form-label" for="shopPackageId">{{ trans('discord-integration::admin.role_sync.condition_shop_package_label') }}</label>
                                    <select class="form-select" name="shop_package_id" id="shopPackageId">
                                        <option value="">{{ trans('discord-integration::admin.role_sync.no_condition') }}</option>

                                        @foreach($shopPackages as $package)
                                            <option value="{{ $package->id }}">{{ $package->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="balanceMin">{{ trans('discord-integration::admin.role_sync.balance_min') }}</label>
                                    <input type="number" min="0" step="0.01" class="form-control" name="balance_min" id="balanceMin">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="balanceMax">{{ trans('discord-integration::admin.role_sync.balance_max') }}</label>
                                    <input type="number" min="0" step="0.01" class="form-control" name="balance_max" id="balanceMax">
                                </div>
                            </div>

                            <hr>

                            <h6>{{ trans('discord-integration::admin.role_sync.discord_role_title') }}</h6>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="discordGuildId">{{ trans('discord-integration::admin.role_sync.guild_id') }}</label>

                                    @if($guilds !== null)
                                        <select class="form-select" name="discord_guild_id" id="discordGuildId" required>
                                            <option value=""></option>

                                            @foreach($guilds as $guild)
                                                <option value="{{ $guild['id'] }}">{{ $guild['name'] }}</option>
                                            @endforeach

                                            @foreach($unknownGuildIds as $unknownGuildId)
                                                <option value="{{ $unknownGuildId }}">{{ trans('discord-integration::admin.unknown_guild', ['id' => $unknownGuildId]) }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input type="text" class="form-control" name="discord_guild_id" id="discordGuildId" required>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="discordRoleId">{{ trans('discord-integration::admin.role_sync.role_id') }}</label>
                                    <input type="text" class="form-control" name="discord_role_id" id="discordRoleId" required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    {{ trans('messages.actions.cancel') }}
                                </button>

                                <button type="submit" class="btn btn-primary">
                                    {{ trans('messages.actions.save') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @push('footer-scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const modal = document.getElementById('roleSyncModal');
                    const form = document.getElementById('roleSyncForm');
                    const methodField = document.getElementById('roleSyncMethod');
                    const modalLabel = document.getElementById('roleSyncModalLabel');
                    const createUrl = '{{ route('discord-integration.admin.roles.store') }}';
                    const updateUrlTemplate = '{{ route('discord-integration.admin.roles.update', ['roleSync' => '__ID__']) }}';
                    const createLabel = @json(trans('discord-integration::admin.role_sync.create'));
                    const editLabel = @json(trans('discord-integration::admin.role_sync.edit'));

                    modal.addEventListener('show.bs.modal', function (event) {
                        form.reset();

                        const button = event.relatedTarget;
                        const id = button ? button.dataset.id : null;

                        if (id) {
                            modalLabel.textContent = editLabel;
                            form.action = updateUrlTemplate.replace('__ID__', id);
                            methodField.value = 'PUT';

                            document.getElementById('discordGuildId').value = button.dataset.guildId;
                            document.getElementById('discordRoleId').value = button.dataset.roleId;
                            document.getElementById('balanceMin').value = button.dataset.balanceMin !== 'null' ? button.dataset.balanceMin : '';
                            document.getElementById('balanceMax').value = button.dataset.balanceMax !== 'null' ? button.dataset.balanceMax : '';

                            const shopSelect = document.getElementById('shopPackageId');
                            if (shopSelect) {
                                shopSelect.value = button.dataset.shopPackageId !== 'null' ? button.dataset.shopPackageId : '';
                            }

                            JSON.parse(button.dataset.siteRoleIds || '[]').forEach(function (roleId) {
                                const checkbox = document.getElementById('siteRole' + roleId);

                                if (checkbox) {
                                    checkbox.checked = true;
                                }
                            });
                        } else {
                            modalLabel.textContent = createLabel;
                            form.action = createUrl;
                            methodField.value = 'POST';
                        }
                    });
                });
            </script>
        @endpush
    @endif
@endsection
