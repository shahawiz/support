<div class="col-md-3">
    <div class="card">
        <div class="card-header">

            <a data-toggle="collapse" href="#collapse-admin" aria-expanded="true"
                aria-controls="collapse-example" id="heading-example" class=" d-block">
                <i class="fa fa-chevron-down pull-right"></i>
                Administration Menu
            </a>
        </div>
        <div id="collapse-admin" class="collapse show" aria-labelledby="heading-example">

            <div class="card-body">
                <li class="li-admin"><a href="{{route('admin')}}"><span class="fa fa-home"></span> Home </a></li>
                <hr>
            <li class="li-admin"><a href="{{route('site_settings')}}"><span class="fa fa-cogs"></span> Site Settings </a></li>
                <hr>
                <li class="li-admin"><a href="{{route('admin_users')}}"><span class="fa fa-users"></span> Users </a></li>
                <hr>
                <li class="li-admin"><a href="{{route('admin_staff')}}"><span class="fa fa-star"></span> Staff </a></li>
                <hr>
                <li class="li-admin"><a href="{{route('admin_departments')}}"><span class="fa fa-building"></span> Departments </a></li>

            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">

            <a data-toggle="collapse" href="#collapse-tickets" aria-expanded="true"
                aria-controls="collapse-example" id="heading-example" class=" d-block">
                <i class="fa fa-chevron-down pull-right"></i>
                Tickets
            </a>
        </div>
        <div id="collapse-tickets" class="collapse show" aria-labelledby="heading-example">

            <div class="card-body">
            <li class="li-admin"><a href="{{route('admin_all_tickets')}}"><span class="fas fa-list"></span> All Tickets </a></li>
                <hr>
                <li class="li-admin"><a href="{{route('admin_pending_tickets')}}"><span class="fa fa-history"></span> Pending Tickets </a></li>
                <hr>
                <li class="li-admin"><a href="{{route('admin_answered_tickets')}}"><span class="fa fa-check"></span> Answered Tickets </a></li>
                <hr>
                <li class="li-admin"><a href="{{route('admin_solved_tickets')}}"><span class="fa fa-check-circle"></span> Sovled Tickets </a>
                </li>
            </div>
        </div>
    </div>

    <br>
    <div class="card">
        <div class="card-header">

            <a data-toggle="collapse" href="#collapse-kcenter" aria-expanded="true"
                aria-controls="collapse-example" id="heading-example" class="collapsed d-block">
                <i class="fa fa-chevron-down pull-right"></i>
                Knowledge Center
            </a>
        </div>
        <div id="collapse-kcenter" class="collapse " aria-labelledby="heading-example">

            <div class="card-body">
                <li class="li-admin"><a href="#"><span class="fas fa-list"></span> All Topics </a></li>
                <hr>
                <li class="li-admin"><a href="#"><span class="fa fa-plus"></span> Add new topic </a></li>
            </div>
        </div>
    </div>


    <br>
    <div class="card">
        <div class="card-header">

            <a data-toggle="collapse" href="#collapse-ans" aria-expanded="true" aria-controls="collapse-example"
                id="heading-example" class="collapsed d-block">
                <i class="fa fa-chevron-down pull-right"></i>
                Announcements </a>
        </div>
        <div id="collapse-ans" class="collapse" aria-labelledby="heading-example">

            <div class="card-body">
                <li class="li-admin"><a href="#"><span class="fa fa-bullhorn"></span> All Announcements </a>
                </li>
                <hr>
                <li class="li-admin"><a href="#"><span class="fa fa-plus"></span> Add new</a></li>
            </div>
        </div>
    </div>

    <br>
    <div class="card">
        <div class="card-header">

            <a data-toggle="collapse" href="#collapse-downloads" aria-expanded="true"
                aria-controls="collapse-example" id="heading-example" class="collapsed d-block">
                <i class="fa fa-chevron-down pull-right"></i>
                Downloads
            </a>
        </div>
        <div id="collapse-downloads" class="collapse" aria-labelledby="heading-example">
            <div class="card-body">
                <li class="li-admin"><a href="#"><span class="fas fa-list"></span> All files </a></li>
                <hr>
                <li class="li-admin"><a href="#"><span class="fa fa-upload"></span> Add new file </a></li>
            </div>
        </div>
    </div>
</div>
