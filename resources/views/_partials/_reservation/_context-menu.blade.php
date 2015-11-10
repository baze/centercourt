<!-- contextmenu -->
<div data-contextmenu="meta.contextmenu" class="dropdown contextmenu">
    <ul class="dropdown-menu" role="menu">
        <li class="dropdown-header">
            @{{ meta.contextmenu.item }}
        </li>
        {{--<li>
            <a role="menuitem" tabindex="-1" href
               ng-href="#/user/@{{ meta.contextmenu.item.email }}/edit"
            >
                <span>Edit</span>
            </a>
        </li>--}}
        <li>
            <a role="menuitem" href data-ng-click="delete(meta.contextmenu.item)">
                <span>Delete</span>
            </a>
        </li>
    </ul>
</div>