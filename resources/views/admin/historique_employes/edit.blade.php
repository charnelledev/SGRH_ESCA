 @extends('layouts.admin.layouts-admin')

   @section('content')
   <div class="max-w-5xl mx-auto p-6 sm:p-8 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-900 dark:to-gray-800 min-h-screen">
       <div class="flex justify-between items-center mb-8">
           <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white tracking-tight">Modifier l’historique</h2>
           <a href="{{ route('admin.historique_employes.index') }}"
              class="flex items-center bg-gray-700 hover:bg-gray-800 text-white px-5 py-2.5 rounded-full transition duration-300 shadow-md transform hover:scale-105">
               <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
               </svg>
               Retour
           </a>
       </div>
       @include('admin.historique_employes.form', ['historiqueEmploye' => $historiqueEmploye, 'employes' => $employes, 'emplois' => $emplois])
   </div>
   @endsection