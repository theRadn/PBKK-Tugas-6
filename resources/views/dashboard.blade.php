@extends('layouts.app')

@section('content')
    {{-- Dashboard Hero Header --}}
    <section class="relative bg-gradient-to-br from-blue-50 via-white to-indigo-50/50 py-12 lg:py-16 overflow-hidden dark:from-slate-950 dark:via-slate-900 dark:to-slate-950">
        {{-- Decorative Background Elements --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-200/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3 dark:bg-blue-900/10"></div>
        <div class="absolute bottom-0 left-0 w-72 h-72 bg-indigo-200/20 rounded-full blur-3xl translate-y-1/2 -translate-x-1/3 dark:bg-indigo-900/10"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
                {{-- Welcome Text --}}
                <div class="space-y-2">
                    <p class="text-sm font-bold uppercase tracking-widest text-its-accent">Dashboard</p>
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white">
                        Selamat datang, <span class="text-its-accent">{{ $user->name }}</span>
                    </h1>
                    <p class="text-slate-500 dark:text-slate-400">
                        Kelola dan pantau semua project kamu di satu tempat.
                    </p>
                </div>

                {{-- Stats Badge --}}
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-3 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl px-5 py-3 shadow-sm">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 dark:bg-slate-700 text-its-accent dark:text-blue-400 flex items-center justify-center text-lg">
                            <i class="fa-solid fa-folder-open"></i>
                        </div>
                        <div>
                            <p class="text-2xl font-extrabold text-slate-900 dark:text-white">{{ $projects->count() }}</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Total Project</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Projects Grid Section --}}
    <section class="py-12 lg:py-16 bg-slate-50/50 dark:bg-slate-950 min-h-[50vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if($projects->isEmpty())
                {{-- Empty State --}}
                <div class="max-w-lg mx-auto text-center py-20">
                    <div class="w-24 h-24 mx-auto mb-8 rounded-3xl bg-gradient-to-br from-blue-100 to-indigo-100 dark:from-slate-800 dark:to-slate-700 flex items-center justify-center shadow-inner">
                        <i class="fa-solid fa-box-open text-4xl text-its-accent/60 dark:text-blue-400/60"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white mb-3">
                        Belum ada project
                    </h2>
                    <p class="text-slate-500 dark:text-slate-400 leading-relaxed mb-8">
                        Kamu belum memiliki project. Mulai buat project pertamamu untuk melihatnya di sini.
                    </p>
                    <div class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-slate-200/60 dark:bg-slate-800 text-slate-400 dark:text-slate-500 text-sm font-medium">
                        <i class="fa-solid fa-circle-info"></i>
                        Project akan muncul setelah dibuat
                    </div>
                </div>
            @else
                {{-- Section Subheader --}}
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white">
                        Project Kamu
                    </h2>
                    <span class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider">
                        Diurutkan terbaru
                    </span>
                </div>

                {{-- Project Cards Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    @foreach($projects as $project)
                        <div class="group relative bg-white dark:bg-slate-800/50 border border-slate-200/80 dark:border-slate-700 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:border-its-accent dark:hover:border-blue-500 transition-all duration-300 flex flex-col overflow-hidden">
                            {{-- Top Accent Line --}}
                            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-its-accent to-its-blue group-hover:h-1.5 transition-all"></div>

                            {{-- Card Header --}}
                            <div class="flex items-start justify-between gap-3 mb-4">
                                <div class="w-11 h-11 rounded-xl bg-blue-100/80 dark:bg-slate-700 text-its-accent dark:text-blue-400 flex items-center justify-center text-lg group-hover:scale-110 transition duration-300">
                                    <i class="fa-solid fa-cube"></i>
                                </div>
                                <span class="text-xs font-bold px-3 py-1.5 rounded-full bg-its-blue text-white shadow-sm shrink-0">
                                    {{ $project->tema_agent }}
                                </span>
                            </div>

                            {{-- Title --}}
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-its-accent transition mb-2 line-clamp-2">
                                {{ $project->judul }}
                            </h3>

                            {{-- Description --}}
                            @if($project->deskripsi)
                                <p class="text-sm text-slate-500 dark:text-slate-400 leading-relaxed line-clamp-3 mb-4 flex-grow">
                                    {{ $project->deskripsi }}
                                </p>
                            @else
                                <p class="text-sm text-slate-400 dark:text-slate-500 italic mb-4 flex-grow">
                                    Belum ada deskripsi.
                                </p>
                            @endif

                            {{-- Card Footer --}}
                            <div class="pt-4 border-t border-slate-100 dark:border-slate-700/50 flex items-center justify-between mt-auto">
                                <div class="flex items-center gap-2 text-xs text-slate-400 dark:text-slate-500">
                                    <i class="fa-regular fa-clock"></i>
                                    <time datetime="{{ $project->created_at->toIso8601String() }}">
                                        {{ $project->created_at->diffForHumans() }}
                                    </time>
                                </div>
                                <div class="flex items-center gap-1 text-xs font-semibold text-its-accent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span>Detail</span>
                                    <i class="fa-solid fa-arrow-right text-[10px] group-hover:translate-x-0.5 transition-transform"></i>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>
@endsection
