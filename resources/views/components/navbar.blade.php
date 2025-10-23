<nav class="bg-[#172130] p-4 text-white">
  <div class="container mx-auto flex justify-between items-center">
    <div>
      <h1 class="text-xl font-bold">Ahmad</h1>
    </div>
    <div class="relative">
      <button id="profileButton" class="block focus:outline-none">
        <img class="w-10 h-10 rounded-full object-cover border-2 border-gray-500 hover:border-blue-400 transition-colors" 
             src="{{$image}}" 
             alt="Foto Profil">
      </button>
      <div id="profileDropdown" 
           class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 text-gray-800 z-50">
        <a href="/profile?username={{ $username }}" class="block px-4 py-2 text-sm hover:bg-gray-100">
          Lihat Profil
        </a>
        <a href="/login" class="block px-4 py-2 text-sm hover:bg-gray-100">
          Log Out
        </a>
      </div>

    </div>
  </div>
</nav>

<script>
  const profileButton = document.getElementById('profileButton');
  const profileDropdown = document.getElementById('profileDropdown');

  profileButton.addEventListener('click', (event) => {
    event.stopPropagation(); 
    profileDropdown.classList.toggle('hidden');
  });

  window.addEventListener('click', () => {
    if (!profileDropdown.classList.contains('hidden')) {
      profileDropdown.classList.add('hidden');
    }
  });
  profileDropdown.addEventListener('click', (event) => {
    event.stopPropagation();
  });
</script>