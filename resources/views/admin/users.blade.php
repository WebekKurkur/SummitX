@php
    $users = [
        [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'role' => 'admin',
            'joined' => 'Jan 15, 2025',
            'orders' => 24,
            'spent' => 143200000,
            'phone' => '+1 (555) 234-5678',
            'location' => 'Denver, CO',
        ],
        [
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'role' => 'customer',
            'joined' => 'Mar 3, 2025',
            'orders' => 12,
            'spent' => 54700000,
            'phone' => '+1 (555) 321-4422',
            'location' => 'Boulder, CO',
        ],
        [
            'name' => 'Mike Johnson',
            'email' => 'mike.j@example.com',
            'role' => 'moderator',
            'joined' => 'Feb 8, 2025',
            'orders' => 8,
            'spent' => 34400000,
            'phone' => '+1 (555) 887-9912',
            'location' => 'Seattle, WA',
        ],
        [
            'name' => 'Sarah Williams',
            'email' => 'sarah.w@example.com',
            'role' => 'customer',
            'joined' => 'Apr 12, 2026',
            'orders' => 18,
            'spent' => 108500000,
            'phone' => '+1 (555) 442-7733',
            'location' => 'Portland, OR',
        ],
        [
            'name' => 'David Chen',
            'email' => 'david.chen@example.com',
            'role' => 'customer',
            'joined' => 'May 1, 2026',
            'orders' => 5,
            'spent' => 30200000,
            'phone' => '+1 (555) 119-3344',
            'location' => 'San Francisco, CA',
        ],
    ];

    $stats = [
        ['label' => 'Total Users', 'value' => '2,847'],
        ['label' => 'Active This Month', 'value' => '892'],
        ['label' => 'New This Week', 'value' => '47'],
    ];

    $roleFilters = ['All', 'Admin', 'Moderator', 'Customer'];
    $activeRole = 'All';
@endphp

@extends('admin.layouts.admin')

@section('title', 'Users')
@section('description', 'Manage platform users and permissions.')

@section('content')
    <header class="flex flex-col gap-6 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="font-display text-3xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)] md:text-4xl lg:text-[40px]">
                Users
            </h1>
            <p class="mt-3 text-base text-[var(--color-charcoal)]/60">
                Manage platform users and permissions
            </p>
        </div>

        <button
            type="button"
            data-user-modal-open
            class="inline-flex items-center justify-center gap-2 rounded-2xl bg-[var(--color-forest)] px-6 py-3 text-sm font-semibold text-white shadow-[0_10px_15px_-4px_rgba(31,58,46,0.2),0_4px_3px_rgba(31,58,46,0.2)] transition hover:bg-[var(--color-forest-deep)]"
        >
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" stroke-linecap="round" stroke-linejoin="round"/>
                <circle cx="8.5" cy="7" r="4"/>
                <path d="M20 8v6M23 11h-6" stroke-linecap="round"/>
            </svg>
            Add User
        </button>
    </header>

    <section aria-label="User stats" class="mt-10">
        <div class="grid gap-6 sm:grid-cols-3">
            @foreach ($stats as $stat)
                <article class="rounded-2xl border border-black/5 bg-white p-6 shadow-[0_2px_6px_rgba(0,0,0,0.04)]">
                    <p class="text-sm font-medium text-[var(--color-charcoal)]/60">{{ $stat['label'] }}</p>
                    <p class="mt-2 font-display text-3xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)] sm:text-[32px]">
                        {{ $stat['value'] }}
                    </p>
                </article>
            @endforeach
        </div>
    </section>

    <section
        aria-label="Search and filter users"
        class="mt-6 rounded-2xl border border-black/5 bg-white p-6 shadow-[0_2px_6px_rgba(0,0,0,0.04)]"
    >
        <form role="search" aria-label="Search users" class="relative" onsubmit="event.preventDefault();">
            <label for="user-admin-search" class="sr-only">Search users</label>
            <span aria-hidden="true" class="pointer-events-none absolute inset-y-0 left-5 flex items-center text-[var(--color-charcoal)]/50">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                    <circle cx="11" cy="11" r="7"/>
                    <path d="m20 20-3.5-3.5" stroke-linecap="round"/>
                </svg>
            </span>
            <input
                id="user-admin-search"
                type="search"
                name="q"
                placeholder="Search users..."
                class="w-full rounded-2xl border border-black/10 bg-[var(--color-offwhite)] py-3.5 pl-14 pr-5 text-base text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
            >
        </form>

        <nav
            aria-label="Filter by role"
            class="mt-6 -mx-1 flex gap-2 overflow-x-auto px-1 pb-1"
            data-filter-group="user-role"
            data-filter-active-class="bg-[var(--color-forest)] text-white"
            data-filter-inactive-class="bg-[var(--color-offwhite)] text-[var(--color-charcoal)]/70 hover:bg-black/5 hover:text-[var(--color-charcoal)]"
        >
            @foreach ($roleFilters as $role)
                @php
                    $isActive = $role === $activeRole;
                    $value = strtolower($role);
                    $base = 'shrink-0 rounded-[10px] px-4 py-2 text-sm font-semibold transition';
                    $state = $isActive
                        ? 'bg-[var(--color-forest)] text-white'
                        : 'bg-[var(--color-offwhite)] text-[var(--color-charcoal)]/70 hover:bg-black/5 hover:text-[var(--color-charcoal)]';
                @endphp
                <button
                    type="button"
                    data-filter-btn="{{ $value }}"
                    @if ($isActive) aria-current="true" @endif
                    class="{{ $base }} {{ $state }}"
                >
                    {{ $role }}
                </button>
            @endforeach
        </nav>
    </section>

    <section
        aria-labelledby="users-table-title"
        class="mt-6 overflow-hidden rounded-2xl border border-black/5 bg-white shadow-[0_2px_12px_0_rgba(0,0,0,0.04)]"
    >
        <h2 id="users-table-title" class="sr-only">Platform users</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-[var(--color-offwhite)] text-xs font-semibold uppercase tracking-[0.08em] text-[var(--color-charcoal)]/60">
                    <tr>
                        <th scope="col" class="px-6 py-4">User</th>
                        <th scope="col" class="px-6 py-4">Role</th>
                        <th scope="col" class="px-6 py-4">Joined</th>
                        <th scope="col" class="px-6 py-4">Orders</th>
                        <th scope="col" class="px-6 py-4">Total Spent</th>
                        <th scope="col" class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-black/5" data-filter-target="user-role">
                    @foreach ($users as $u)
                        @php
                            $roleBadge = match ($u['role']) {
                                'admin'     => ['label' => 'Admin', 'classes' => 'bg-[var(--color-forest)]/10 text-[var(--color-forest)]'],
                                'moderator' => ['label' => 'Moderator', 'classes' => 'bg-[var(--color-orange)]/10 text-[var(--color-orange)]'],
                                'customer'  => ['label' => 'Customer', 'classes' => 'bg-black/10 text-[var(--color-charcoal)]/70'],
                                default     => ['label' => ucfirst($u['role']), 'classes' => 'bg-black/5 text-[var(--color-charcoal)]/70'],
                            };
                        @endphp
                        @php
                            $editPayload = json_encode([
                                'mode' => 'edit',
                                'name' => $u['name'],
                                'fields' => [
                                    'name' => $u['name'],
                                    'email' => $u['email'],
                                    'role' => $u['role'],
                                ],
                            ], JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_AMP|JSON_HEX_QUOT);
                            $viewPayload = json_encode([
                                'name' => $u['name'],
                                'email' => $u['email'],
                                'role' => $u['role'],
                                'joined' => $u['joined'],
                                'orders' => $u['orders'],
                                'spent' => 'Rp. ' . number_format($u['spent'], 0, ',', '.'),
                                'phone' => $u['phone'],
                                'location' => $u['location'],
                                'edit_payload' => $editPayload,
                            ], JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_AMP|JSON_HEX_QUOT);
                        @endphp
                        <tr
                            data-filter-tag="{{ strtolower($u['role']) }}"
                            data-confirm-remove
                            class="bg-white transition hover:bg-[var(--color-offwhite)]/60"
                        >
                            <td class="px-6 py-5 align-top">
                                <p class="font-display text-base font-semibold tracking-[-0.025em] text-[var(--color-charcoal)]">
                                    {{ $u['name'] }}
                                </p>
                                <p class="mt-1 inline-flex items-center gap-2 text-sm text-[var(--color-charcoal)]/60">
                                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="m22 6-10 7L2 6" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    {{ $u['email'] }}
                                </p>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <span class="inline-flex items-center rounded-[10px] px-3 py-1 text-xs font-semibold {{ $roleBadge['classes'] }}">
                                    {{ $roleBadge['label'] }}
                                </span>
                            </td>
                            <td class="px-6 py-5 align-middle text-sm text-[var(--color-charcoal)]">
                                {{ $u['joined'] }}
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <span class="font-display text-base font-semibold text-[var(--color-charcoal)]">{{ $u['orders'] }}</span>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <span class="font-display text-base font-semibold text-[var(--color-charcoal)]">Rp. {{ number_format($u['spent'], 0, ',', '.') }}</span>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        type="button"
                                        data-user-view-modal-open
                                        data-user-view-payload="{{ $viewPayload }}"
                                        aria-label="View {{ $u['name'] }}"
                                        class="inline-flex h-9 w-9 items-center justify-center rounded-[10px] bg-[var(--color-offwhite)] text-[var(--color-charcoal)]/70 transition hover:bg-black/5 hover:text-[var(--color-charcoal)]"
                                    >
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                            <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z" stroke-linecap="round" stroke-linejoin="round"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </button>
                                    <button
                                        type="button"
                                        data-user-modal-open
                                        data-user-payload="{{ $editPayload }}"
                                        aria-label="Edit {{ $u['name'] }}"
                                        class="inline-flex h-9 w-9 items-center justify-center rounded-[10px] bg-[var(--color-offwhite)] text-[var(--color-charcoal)]/70 transition hover:bg-black/5 hover:text-[var(--color-charcoal)]"
                                    >
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                            <path d="M12 20h9M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                    <button
                                        type="button"
                                        aria-label="Delete {{ $u['name'] }}"
                                        data-confirm-delete
                                        data-confirm-type="user"
                                        data-confirm-name="{{ $u['name'] }}"
                                        class="inline-flex h-9 w-9 items-center justify-center rounded-[10px] bg-[var(--color-offwhite)] text-[var(--color-charcoal)]/70 transition hover:bg-rose-50 hover:text-rose-600"
                                    >
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                            <path d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div
                data-filter-empty="user-role"
                class="hidden px-6 py-16 text-center text-sm text-[var(--color-charcoal)]/60"
            >
                No users match this role.
            </div>
        </div>
    </section>
@endsection

@push('modals')
    @include('admin.partials.user-modal')
    @include('admin.partials.user-view-modal')
@endpush
