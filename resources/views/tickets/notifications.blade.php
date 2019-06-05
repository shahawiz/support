<input type="hidden" id="notifiy_count" value="{{$unread_notifications}}">

 <!-- ICON -->
 <div class="dropdown nav-button notifications-button hidden-sm-down">

    <a class="btn btn-default dropdown-toggle" style="margin-right: -24px;" href="#" id="notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i id="notificationsIcon" class="fa fa-bell-o" aria-hidden="true"></i>
      <span id="notificationsBadge" class="badge badge-danger"><i class="fa fa-spinner fa-pulse fa-fw" aria-hidden="true"></i></span>
    </a>

    <!-- NOTIFICATIONS -->
    <div class="dropdown-menu notification-dropdown-menu" aria-labelledby="notifications-dropdown">
      <h6 class="dropdown-header">Notifications</h6>

      <!-- CHARGEMENT -->
      <a id="notificationsLoader" class="dropdown-item dropdown-notification" href="#">
        <p class="notification-solo text-center"><i id="notificationsIcon" class="fa fa-spinner fa-pulse fa-fw" aria-hidden="true"></i> Loading latest unread notifications ...</p>
      </a>

      <div id="notificationsContainer" class="notifications-container">

      <!-- Read NOTIFICATIONS -->

      {{-- @foreach ($read_notifications as $notification)
    <a class="dropdown-item dropdown-notification " href="{{route('view_ticket',$notification['data']['ticketSlug'])}}">
        <div class="notification-read">
          <i class="fa fa-times" aria-hidden="true"></i>
        </div>
        <img class="notification-img" src="/images/avatars/{{$notification['data']['avatar']}}" alt="Icone Notification" />
        <div class="notifications-body">
        <p class="notification-texte">{{$notification['data']['msg']}}</p>
          <p class="notification-date text-muted">
            <i class="fa fa-clock-o" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($notification['data']['time'])->diffForHumans() }}

          </p>
        </div>
      </a>
      @endforeach --}}
    </div>

      <!-- AUCUNE NOTIFICATION -->
      <a id="notificationAucune" class="dropdown-item dropdown-notification" href="#">
        <p class="notification-solo text-center">No new unread notifications
            </p>
      </a>

      <!-- TOUTES -->
    <a class="dropdown-item dropdown-notification-all" href="{{route('all_notifications')}}">
        View All Notifications
      </a>

    </div>

  </div>


<!-- TEMPLATE NOTIFICATION -->
<script id="notificationTemplate" type="text/html">
  <!-- NOTIFICATION -->
  <a class="dropdown-item dropdown-notification %%status%% " href="%%href%%">
    <div class="notification-read">
      <i class="fa fa-times" aria-hidden="true"></i>
    </div>
    <img class="notification-img" src="%%image%%" alt="Icone Notification" />
    <div class="notifications-body">
      <p class="notification-texte">%%texte%%</p>
      <p class="notification-date text-muted">
        <i class="fa fa-clock-o" aria-hidden="true"></i> %%date%%
      </p>
    </div>
  </a>
</script>
