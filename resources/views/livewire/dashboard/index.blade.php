<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-sm font-medium text-gray-500">Usuários</h3>
        <p class="text-3xl font-bold text-gray-800 mt-2">{{ \App\Models\User::count() }}</p>
        <a href="{{ route('dashboard.users') }}" class="text-blue-600 text-sm hover:underline mt-2 inline-block">Gerenciar</a>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-sm font-medium text-gray-500">Configurações</h3>
        <p class="text-3xl font-bold text-gray-800 mt-2"><i class="fa-solid fa-gear"></i></p>
        <a href="{{ route('dashboard.config') }}" class="text-blue-600 text-sm hover:underline mt-2 inline-block">Editar</a>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-sm font-medium text-gray-500">Permissões</h3>
        <p class="text-3xl font-bold text-gray-800 mt-2"><i class="fa-solid fa-shield-halved"></i></p>
        <a href="{{ route('dashboard.permissions') }}" class="text-blue-600 text-sm hover:underline mt-2 inline-block">Gerenciar</a>
    </div>
</div>
