<nav id="sidebar">
    <ul>
        <li>
            <span class="logo">mtc maangement</span>
            <button class="toggle-btn">
                
                <i class='bx bx-laptop pr-2'></i>
            </button>
        </li>
        <li>
            <a href="/home">
                <i class='bx bx-dna'></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="active">
            <a href="/">
                <i class='bx bx-laptop pr-2'></i>
                <span>List of MTC</span>
            </a>
        </li>
        <li class="active">
            <a href="/seat">
                <i class='bx bx-map-alt'></i>
                <span>Floor View</span>
            </a>
        </li>
        <li class="active">
            <a href="/testadmin">
                <i class='bx bx-map-alt'></i>
                <span>test admin</span>
            </a>
        </li>
        <li class="active">
            <a href="/forms">
                <i class='bx bx-laptop pr-2'></i>
                <span>Loan MTC</span>
            </a>
            {{-- <button class="dropdown-btn">
                <i class='bx bx-laptop pr-2'></i>
                <span>Add</span>
                <i class='bx bx-laptop pr-2'></i>
            </button> --}}
        </li>
        <li>
            <a href="/create">
                <i class='bx bx-laptop pr-2'></i>
                <span>Add MTC</span>
            </a>
        </li>
    </ul>
</nav>

<style>

    /* root */
    :root{
        --base-clr: #e88824;
        --line-clr: #42434a;
        --hover-clr: #222533;
        --text-clr: #3636a9;
        --accent-clr: #2484E8;
        --secondary-text-clr: #b0b3c1;
    }

    body{
        color: var(--text-clr);
    }


    #sidebar{
        box-sizing: border-box;
        height: 100vh;
        width: 250px;
        padding: 5px 1em;
        background-color: var(--base-clr);
        border-right: 1px solid var(--line-clr);

        position: sticky;
        top: 0;
        align-self: start;
    }

    #sidebar ul{
        list-style: none;
    }

    #sidebar > ul > li:first-child{
        display: flex;
        justify-content: flex-end;
        margin-bottom: 16px;
        .logo{
            font-weight: 600;
        }
    }
    #sidebar ul li.active a{
        color: var(--accent-clr);

        i{
            fill: var(--accent-clr);
        }
    }
    #sidebar svg{
        flex-shrink: 0;
        fill: var(--text-clr)
    }

    #sidebar a span, #sidebar .dropdown-btn span{
        flex-grow: 1;
    }
    #sidebar a:hover, #sidebar .dropdown-btn:hover{
        background-color: var(--hover-clr);
    }

    /* #sidebar a, #sidebar .dropdown-btn, #sidebar .logo{
        border-radius: .5em;
        padding: 85em;
        text-decoration: none;
        color: var(--text-clr);
        display: flex;
        align-items: center;
        gap: 1em;

    } */
</style>