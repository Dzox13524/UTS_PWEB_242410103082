@extends('layouts.app')

@section('title', 'Pengelolaan Tugas')

@section('content')
<div class="bg-gray-800 bg-opacity-70 backdrop-blur-md rounded-lg shadow-xl p-6 sm:p-8 border border-gray-700 text-white">
    
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold">Pengelolaan Data Tugas</h1>
            <p class="text-gray-400 mt-1">Menampilkan semua tugas yang ada.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3 mt-4 sm:mt-0 w-full sm:w-auto">
            <button type="button" id="tambahTugas"
               class="w-full sm:w-auto text-center bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md transition duration-300">
                Tambah Tugas
            </button>
            <a href="{{ route('dashboard', ['username' => $username]) }}" 
               class="w-full sm:w-auto text-center bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md transition duration-300">
                Kembali ke Dashboard
            </a>
        </div>
    </div>

    <div class="overflow-x-auto rounded-lg border border-gray-700">
        <table class="min-w-full divide-y divide-gray-700">
            <thead class="bg-gray-900 bg-opacity-70">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                        Judul Tugas
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                        Tenggat
                    </th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-300 uppercase tracking-wider">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody id="tabel" class="bg-gray-800 bg-opacity-50 divide-y divide-gray-700">
                
                @forelse ($tugas as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                        {{ $item['id_tugas'] }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">
                        {{ $item['judul'] }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-300 max-w-xs truncate">
                        <span title="{{ $item['deskripsi'] }}">
                            {{ $item['deskripsi'] }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 font-mono">
                        {{ $item['tenggat'] }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button type="button" class="delete-btn bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-md text-xs transition duration-200">
                            Done
                        </button>
                    </td>
                </tr>
                @empty
                <tr id="emptyRow">
                    <td colspan="5" class="px-6 py-10 text-center text-gray-400">
                        Tidak ada data tugas yang tersedia saat ini.
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>

</div>

<div id="taskModal" class="hidden fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4">
    <div class="bg-gray-900 rounded-lg shadow-xl w-full max-w-lg border border-gray-700">
        <div class="flex justify-between items-center border-b border-gray-700 p-5">
            <h3 class="text-2xl font-bold text-white">Tambah Tugas Baru</h3>
            <button id="closeModalBtn" class="text-gray-400 hover:text-white text-3xl">&times;</button>
        </div>
        
        <form id="taskForm" class="p-6">
            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-300 mb-2">Judul Tugas</label>
                <input type="text" id="judul" required
                       class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-300 mb-2">Deskripsi</label>
                <textarea id="deskripsi" rows="3" required
                          class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>
            <div class="mb-6">
                <label for="tenggat" class="block text-sm font-medium text-gray-300 mb-2">Due Date</label>
                <input type="date" id="tenggat" required
                       class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       style="color-scheme: dark;">
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" id="cancelModalBtn" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md transition duration-300">
                    Batal
                </button>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md transition duration-300">
                    Simpan Tugas
                </button>
            </div>
        </form>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        const tabel = document.getElementById('tabel');
        const tambahTugas = document.getElementById('tambahTugas');
        const taskModal = document.getElementById('taskModal');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const cancelModalBtn = document.getElementById('cancelModalBtn');
        const taskForm = document.getElementById('taskForm');
        
        function showModal() {
            taskModal.classList.remove('hidden');
        }
        
        function hideModal() {
            taskModal.classList.add('hidden');
            taskForm.reset();
        }
        
        tambahTugas.addEventListener('click', showModal);
        closeModalBtn.addEventListener('click', hideModal);
        cancelModalBtn.addEventListener('click', hideModal);
        
        taskModal.addEventListener('click', function(e) {
            if (e.target === taskModal) {
                hideModal();
            }
        });
        
        taskForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const judul = document.getElementById('judul').value;
            const deskripsi = document.getElementById('deskripsi').value;
            const dueDate = document.getElementById('tenggat').value;
            
            let newId = 1;
            const lastRow = tabel.querySelector('tr:last-child:not(#emptyRow)');
            if (lastRow) {
                const lastId = parseInt(lastRow.querySelector('td:first-child').innerText);
                newId = lastId + 1;
            }
            
            const emptyRow = document.getElementById('emptyRow');
            if (emptyRow) {
                emptyRow.remove();
            }
            
            const newRowHTML = `
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                        ${newId}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">
                        ${judul}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-300 max-w-xs truncate">
                        <span title="${deskripsi}">${deskripsi}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 font-mono">
                        ${dueDate}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button type="button" class="delete-btn bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-md text-xs transition duration-200">
                            Done
                        </button>
                    </td>
                </tr>
            `;
            
            tabel.insertAdjacentHTML('beforeend', newRowHTML);
            hideModal();
        });

        tabel.addEventListener('click', function(e) {
            if (e.target.classList.contains('delete-btn')) {
                const row = e.target.closest('tr');
                
                if (row) {
                    row.remove();
                }
                if (tabel.querySelectorAll('tr:not(#emptyRow)').length === 0) {
                     const emptyRowHTML = `
                        <tr id="emptyRow">
                            <td colspan="5" class="px-6 py-10 text-center text-gray-400">
                                Tidak ada data tugas yang tersedia saat ini.
                            </td>
                        </tr>
                    `;
                    tabel.innerHTML = emptyRowHTML;
                }
            }
        });
        
    });
</script>
@endsection

