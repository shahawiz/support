<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a target="_blank" href="#" class="navbar-brand" style="font-size: large; font-weight: bold;">
                <img src="{{asset ('/images/logo.png')}}" width="48px"/>  Support Tickets</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="#">Home</a></li>
                <li class="active"><a href="/tickets/create" >Create a Ticket</a></li>
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">All Tickets
                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/tickets/all">All Tickets</a></li>
                        <li><a href="/tickets/pending">Pending Tickets</a></li>
                        <li><a href="/tickets/closed">Closed Tickets</a></li>
                    </ul>
                 </li>
             </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        <strong>Welcome , </strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <img width="85px;" src="https://cdn4.iconfinder.com/data/icons/avatar-vol-1-3/512/7-128.png"/>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong>User Name</strong></p>
                                        <p class="text-left small">mail@email.com</p>
                                        <p class="text-left">
                                            <a href="#" class="btn btn-primary btn-block btn-sm">My Profile</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="#" class="btn btn-danger btn-block">Logout</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
