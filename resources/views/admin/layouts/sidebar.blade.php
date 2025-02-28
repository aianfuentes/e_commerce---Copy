<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Sidebar | By Code Info</title>

    <!-- Box icons CDN link -->
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />

    <style>
      @import url("https://fonts.googleapis.com/css2?family=Agdasima:wght@400;700&display=swap");

      * {
        margin: 0;
        padding: 0;
        font-family: "Agdasima", sans-serif;
      }

      /* Color Variables */
      :root {
        --sidebar-bg: #2f323a;
        --sidebar-width: 100px;
        --sidebar-width-active: 150px;
        --text-color: #fff;
        --menu-item-color: rgb(188, 186, 186);
        --menu-item-hover-bg: rgb(117, 109, 109);
        --menu-item-hover-color: #fff;
        --menu-header-color: rgb(137, 135, 135);
        --tooltip-bg: rgba(0, 0, 0, 0.8);
        --border-color: rgb(218, 147, 147);
      }
      .sidebar {
        position: sticky;
        top: 0;
        left: 0;
        height: 100vh;
        width: var(--sidebar-width);
        color: var(--text-color);
        padding: 0 20px;
        background-color: var(--sidebar-bg);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        transition: all 0.5s ease;
      }

      .logo,
      .menu-item,
      .logout {
        display: flex;
        align-items: center;
        justify-content: center;
        transition: justify-content 0.5s ease;
      }
      .logo {
        margin-top: 30px;
      }

      .logo i,
      .menu-item i,
      .logout i {
        font-size: 2rem;
        transition: 0.5s ease;
      }

      .logo span,
      .menu-item span,
      .logout span {
        margin-left: 10px;
        display: none;
        transition: 0.5s ease;
      }

      .menu {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        justify-content: center;
      }

      .menu-header {
        color: var(--menu-header-color);
        text-transform: uppercase;
        text-align: center;
        font-size: 16px;
        transition: 0.5s ease;
      }

      .menu-item {
        cursor: pointer;
        padding: 10px 20px;
        border-radius: 3px;
        color: var(--menu-item-color);
        transition: all 0.5 ease;
      }

      .menu-item:hover,
      .nav-active,
      .logout:hover {
        background: var(--menu-item-hover-bg);
        color: var(--menu-item-hover-color);
        transition: 0.5s ease;
      }

      .menu-item i,
      .logout i {
        font-size: 20px;
      }

      .logout {
        padding: 10px 20px;
        margin-bottom: 10px;
        border-radius: 3px;
        cursor: pointer;
        color: var(--menu-item-color);
      }

      /* When sidebar menu is active */
      .sidebar.active {
        width: var(--sidebar-width-active);
      }

      .sidebar.active .logo,
      .sidebar.active .menu-item,
      .sidebar.active .logout {
        justify-content: flex-start;
      }

      /* When sidebar is active, show the nav items */
      .sidebar.active .logo span,
      .sidebar.active .menu-item span,
      .sidebar.active .logout span {
        display: block;
      }

      .sidebar.active .menu-header {
        font-size: 20px;
        text-align: left;
      }

      /* Toggle menu */
      .toggle-menu {
        position: absolute;
        top: 10px;
        right: -20px;
        background-color: var(--sidebar-bg);
        border: 1px solid var(--menu-item-hover-bg);
        color: var(--text-color);
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      /* Menu item tooltip */
      [data-tooltip] {
        position: relative;
      }
      [data-tooltip]::before {
        content: attr(data-tooltip);
        position: absolute;
        left: 120%;
        top: 50%;
        transform: translateY(-50%);
        background-color: var(--tooltip-bg);
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 20px;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.5s ease;
      }

      [data-tooltip]::after {
        content: "";
        position: absolute;
        left: 100%;
        top: 50%;
        transform: translateY(-50%);
        border-width: 5px;
        border-style: solid;
        border-color: transparent var(--tooltip-bg) transparent transparent;
        opacity: 0;
        transition: opacity 0.5s ease;
      }
      .sidebar:not(.active) [data-tooltip]:hover::before,
      .sidebar:not(.active) [data-tooltip]:hover::after {
        opacity: 1;
      }
      .logout[data-tooltip]::before {
        left: 120%;
      }
      .logout[data-tooltip]::after {
        left: 100%;
      }
    </style>
  </head>

  <body>
    <aside class="sidebar" id="sidebar">
      <!-- Logo -->
      <div class="logo">
        <i class="bx bx-cube-alt"></i>
      </div>

      <!-- Menu links -->
      <nav class="menu">
        <h1 class="menu-header">Menu</h1>
        <div class="menu-item nav-active" data-tooltip="Home">
          <i class="bx bx-home-smile"></i>
          <span>Home</span>
        </div>
        <div class="menu-item" data-tooltip="Stats">
          <i class="bx bx-bar-chart-alt-2"></i>
          <span>Products</span>
        </div>
        <div class="menu-item" data-tooltip="Chat">
          <i class="bx bx-message-square-dots"></i>
          <span>Reports</span>
        </div>
        <div class="menu-item" data-tooltip="Bookmarks">
          <i class="bx bx-bookmarks"></i>
          <span>Orders</span>
        </div>
        <div class="menu-item" data-tooltip="Notification">
          <i class="bx bx-bell"></i>
          <span>Notification</span>
        </div>
        <div class="menu-item" data-tooltip="Setting">
          <i class="bx bx-cog"></i>
          <span>Setting</span>
        </div>

        <h1 class="menu-header shortcuts">Shortcuts</h1>
        <div class="menu-item" data-tooltip="Add">
          <i class="bx bx-add-to-queue"></i>
          <span>Add</span>
        </div>
        <div class="menu-item" data-tooltip="Remove">
          <i class="bx bx-message-square-minus"></i>
          <span>Remove</span>
        </div>
      </nav>

      <!-- Logout -->
      <div class="logout" data-tooltip="Logout">
        <i class="bx bx-log-out"></i>
        <span>Logout</span>
      </div>

      <!-- Toggle menu -->
      <div class="toggle-menu" id="toggle-button">
        <i class="bx bxs-right-arrow"></i>
        <i class="bx bxs-left-arrow"></i>
      </div>
    </aside>

    <script>
      const toggleButton = document.getElementById("toggle-button");
      const sidebar = document.getElementById("sidebar");

      const openIcon = toggleButton.querySelector(".bxs-right-arrow");
      const closeIcon = toggleButton.querySelector(".bxs-left-arrow");

      closeIcon.style.display = "none";

      toggleButton.addEventListener("click", () => {
        sidebar.classList.toggle("active");

        if (sidebar.classList.contains("active")) {
          openIcon.style.display = "none";
          closeIcon.style.display = "block";
        } else {
          openIcon.style.display = "block";
          closeIcon.style.display = "none";
        }
      });
    </script>
  </body>
</html>
