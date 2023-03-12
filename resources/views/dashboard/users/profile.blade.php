<x-app-layout title="Awazone | Dashboard - Profile">
    <x-dashboard.users.profile :users="$user" :currencies="$currencies" :currency="$currency" />
</x-guest-layout>
