@extends('layouts.app')

@section('title', 'Projects')
@section('meta_description', 'Explore projects Rishan has worked on — personal, academic, and in progress.')

@section('content')
    <div class="heading">
        <h1>PROJECTS</h1>
        @include('components.mobile-menu-button')
    </div>

    <div class="main-content" x-data="projectToc()">
        <div id="tableOfContents" class="mb-6">
            <h2>Contents:</h2>
            <ul>
                <template x-for="(mainItem, mainIndex) in items" :key="mainIndex">
                    <li>
                        <button @click="toggleExpand(mainItem)" class="flex items-center gap-1">
                            <i :class="mainItem.isOpen ? 'fa-solid fa-minus' : 'fa-solid fa-plus'"></i>
                            <span x-text="mainItem.title"></span>
                        </button>
                        <ul x-show="mainItem.isOpen" x-transition>
                            <template x-for="(subItem, subIndex) in mainItem.subItems" :key="subIndex">
                                <li>
                                    <button @click="toggleExpand(subItem)" class="flex items-center gap-1">
                                        <i :class="subItem.isOpen ? 'fa-solid fa-minus' : 'fa-solid fa-plus'"></i>
                                        <span x-text="subItem.title"></span>
                                    </button>
                                    <ul x-show="subItem.isOpen" x-transition>
                                        <template x-for="(project, projectIndex) in subItem.subItems" :key="projectIndex">
                                            <li>
                                                <button @click="toggleExpand(project)" class="flex items-center gap-1">
                                                    <i :class="project.isOpen ? 'fa-solid fa-minus' : 'fa-solid fa-plus'"></i>
                                                    <span x-text="project.title"></span>
                                                </button>
                                                <ul x-show="project.isOpen" x-transition>
                                                    <template x-for="(link, linkIndex) in project.links" :key="linkIndex">
                                                        <li>
                                                            <a :href="link.href" x-text="link.name"></a>
                                                        </li>
                                                    </template>
                                                </ul>
                                            </li>
                                        </template>
                                    </ul>
                                </li>
                            </template>
                        </ul>
                    </li>
                </template>
            </ul>
        </div>

        <div class="page-intro" id="projects-intro">
            <p>
                Below I will be briefly talking about some of the projects I have worked on during my time.
                If you would like to read more, there will be a link to a separate page for each project soon.
            </p>
        </div>

        {{-- Load the full project content --}}
        @include('pages.projects.content')
    </div>

    <script>
        function projectToc() {
            return {
                items: {!! file_get_contents(resource_path('data/projects_toc.json')) !!},
                toggleExpand(item) {
                    item.isOpen = !item.isOpen;
                }
            }
        }
    </script>
@endsection
