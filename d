[33mcommit 1c7681b945b72c9e072a8a7410aa60137fa117c3[m[33m ([m[1;36mHEAD[m[33m -> [m[1;32mmain[m[33m, [m[1;31morigin/main[m[33m, [m[1;31morigin/HEAD[m[33m)[m
Author: AdityaAksar <54211361+AdityaAksar@users.noreply.github.com>
Date:   Wed Dec 31 18:39:46 2025 +0800

    refactor: remove dark mode classes from all blade views
    
    - Remove 'dark:' utility classes from layouts/app.blade.php and other views
    - Enforce light mode consistency across the frontend
    - Clean up unused dark mode styles

[33mcommit e4f4edc900eefcaf74811da73c31dd0e7a550f69[m
Author: AdityaAksar <54211361+AdityaAksar@users.noreply.github.com>
Date:   Wed Dec 31 12:24:27 2025 +0800

    feat: implement responsive gallery page with lightbox and search
    - Created GalleryList Livewire component for managing gallery data.
    - Designed galleries.blade.php with a responsive grid layout and hover effects.
    - Implemented a lightbox modal with keyboard support and navigation (next/prev) for viewing multiple images.
    - Added search functionality and pagination to the gallery list.
    - Improved mobile responsiveness for modal navigation controls and image centering.
    - Registered /galeri route in web.php.

[33mcommit 0ddecde91b6a145cf2318eddd7ce5fcf120d39e0[m
Author: AdityaAksar <54211361+AdityaAksar@users.noreply.github.com>
Date:   Wed Dec 31 11:59:48 2025 +0800

    feat: implement dedicated assignments page with accordion layout and search
    - Created AssignmentList Livewire component for real-time search and pagination.
    - Designed ssignments.blade.php using an accordion layout consistent with the home page.
    - Implemented visible countdown timer and status badges in task headers.
    - Refined sorting logic: Active tasks appear first, ordered by nearest deadline.
    - Added support for multiple file downloads and external submission links.
    - Registered /assignments route in web.php.

[33mcommit a5a02dc98bf78be646dfdbe5e0b37edb040bcb95[m
Author: AdityaAksar <54211361+AdityaAksar@users.noreply.github.com>
Date:   Wed Dec 31 10:39:25 2025 +0800

    feat(home): revamp assignment section with accordion and mobile layout fixes
    - Refactored 'Tugas & Deadline' section to use an interactive Accordion layout.
    - Moved countdown timer to the header for immediate visibility.
    - Fixed 'Tenggat' label alignment on mobile devices (left-aligned on mobile, right on desktop).
    - Added logic for multiple file downloads and submission links.

[33mcommit 1abb9b29eda704a426164346a400e1fab7cbe275[m
Author: AdityaAksar <54211361+AdityaAksar@users.noreply.github.com>
Date:   Wed Dec 31 03:20:26 2025 +0800

    feat: add materials page with multi-file support and realtime search
    - Updated Material model to cast 'file_path' as array for multiple uploads
    - Refactored Filament MaterialResource to handle array data in table and forms
    - Implemented 'MaterialList' Livewire component for real-time search and pagination
    - Fixed layout alignment and centering for grid items

[33mcommit 5e79d4e8e7b8b9fb2ae0cd3045804e480a69b745[m
Author: AdityaAksar <54211361+AdityaAksar@users.noreply.github.com>
Date:   Wed Dec 31 02:11:02 2025 +0800

    feat: implement dynamic weekly schedule page with filtering
    - Created ScheduleController to handle weekly schedule fetching and grouping
    - Implemented filtering logic for Day and Class in ScheduleController
    - Created 'schedules.blade.php' view with responsive flexbox layout
    - Added dropdown filters for Day and Class with persistence state
    - Registered '/jadwal' route pointing to ScheduleController@index
    - Updated app timezone to 'Asia/Makassar' to fix incorrect day detection

[33mcommit 2d2c1cf0dd1d1f1cba52de9cbd53cae96f9ebad0[m
Author: AdityaAksar <54211361+AdityaAksar@users.noreply.github.com>
Date:   Wed Dec 31 01:34:46 2025 +0800

    feat: add dynamic members page and refactor blade layout
    - Created MemberController to handle student listing logic independently
    - Added new route '/anggota' pointing to MemberController@index
    - Created members.blade.php view with dynamic data loop (Instagram, LinkedIn, GitHub icons)
    - Refactored layout to use 'layouts.app' master template for better maintainability
    - Added social media icons logic to display only when data exists

[33mcommit 91dc7b28144056d9ddb6832d619ddd78e13bade3[m
Author: AdityaAksar <54211361+AdityaAksar@users.noreply.github.com>
Date:   Tue Dec 30 14:13:38 2025 +0800

    feat: implement dynamic home page and fix filament resource handling
    - Replaced static welcome view with dynamic home.blade.php
    
    - Added HomeController to fetch Schedules, Assignments, Students, and Galleries
    
    - Fixed Student resource photo upload issues (disk config & disabled fetchFileInformation)
    
    - Updated Schedule resource to use TagsInput for lecturers
    
    - Improved Assignment resource UX (Textarea description)
    
    - Updated web routes and added public assets
