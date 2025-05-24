function resizeWithMain() {
    const aside = document.querySelector('aside.sidebar');
    const main = document.querySelector('main.content');
    
    if (aside.classList.contains("hidden") || window.innerWidth < 768) {
        main.style.paddingLeft = '0';
    } else {
        main.style.paddingLeft = aside.offsetWidth + 'px';
    }
}



// Sidebar Menu Toggle
function sidebarMenuOpenClose() {
    const sidebar = document.querySelector('aside.sidebar');

    if (sidebar.classList.contains("hidden")) {
        sidebar.classList.remove("hidden");
        setTimeout(resizeWithMain, 1);
    }
    else {
        sidebar.classList.add("hidden");
        resizeWithMain();
    }
}

$('aside.sidebar .sidebar__menu__dropmenu').on('show.bs.collapse', function () {
    const icon = $(this).siblings('.nav-link').find('.sidebar__menu__dropicon');
    icon.addClass('rotate-down');
});

$('aside.sidebar .sidebar__menu__dropmenu').on('hide.bs.collapse', function () {
    const icon = $(this).siblings('.nav-link').find('.sidebar__menu__dropicon');
    icon.removeClass('rotate-down');
});



// Load Page Do
$(document).ready(resizeWithMain);

// Resize Page Do
$(window).on('resize', () => {
    let windowWidth = $(window).width(); // <- düzeltilmiş hali
    if (windowWidth > 768) {
        $('aside.sidebar').removeClass("hidden");
    }
    else {
        $("aside.sidebar").addClass("hidden");
    }
    resizeWithMain();
});




// Click Menu Button Do
$("#sidebar-btn").on("click", sidebarMenuOpenClose);
$("#sidebar-close-btn").on("click", sidebarMenuOpenClose);