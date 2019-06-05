/**
 * The difference between now and a prior or an
 * upcoming event, returned as readable text for humans.
 *
 *
 * @param {Number} unixTime milliseconds that have elapsed since
 *                          00:00:00 Thursday, 1 January 1970
 * @param {boolean} ms set true if unixTime is not in milliseconds
 * @return {String}
 */

function diffForHumans(unixTime, ms) {
    // Adjust for milliseconds
    ms = ms || false;
    unixTime = ms ? unixTime * 1000 : unixTime;

    var d = new Date();
    var diff = Math.abs(d.getTime() - unixTime);
    var intervals = {
        y: diff / (365 * 24 * 60 * 60 * 1 * 1000),
        m: diff / (30.5 * 24 * 60 * 60 * 1 * 1000),
        d: diff / (24 * 60 * 60 * 1 * 1000),
        h: diff / (60 * 60 * 1 * 1000),
        i: diff / (60 * 1 * 1000),
        s: diff / (1 * 1000)
    };

    Object.keys(intervals).map(function(value, index) {
        return (intervals[value] = Math.floor(intervals[value]));
    });

    var unit;
    var counter;

    switch (true) {
        case intervals.y > 0:
            counter = intervals.y;
            unit = "year";
            break;
        case intervals.m > 0:
            counter = intervals.m;
            unit = "month";
            break;
        case intervals.d > 0:
            counter = intervals.d;
            unit = "day";
            break;
        case intervals.h > 0:
            counter = intervals.h;
            unit = "hour";
            break;
        case intervals.i > 0:
            counter = intervals.i;
            unit = "minute";
            break;
        default:
            counter = intervals.s;
            unit = "second";
            break;
    }

    if (counter > 1) {
        unit = unit + "s";
    }

    if (counter === 0) {
        return "now";
    }

    return (
        counter + " " + unit + (unixTime > d.getTime() ? " from now" : " ago")
    );
}

$(function() {
    function markAsRead() {
        alert("");
    }

    notifiy_sound = document.getElementById("notifiy_sound");
    let notifications = new Array();
    let count = 0;

    var lastCount = 0;

    function makeBadge(texte) {
        return '<span class="badge badge-default">' + texte + "</span>";
    }

    appNotifications = {
        // Initialisation
        init: function() {
            // On masque les éléments
            $("#notificationsBadge").hide();
            $("#notificationAucune").hide();
            // $("#notificationsIcon").show();

            // On bind le clic sur les notifications
            $("#notifications-dropdown").on("click", function() {
                var open = $("#notifications-dropdown").attr("aria-expanded");

                // Check if the menu is open at the time of the click
                if (open === "false") {
                    appNotifications.loadAll();
                }
            });

            // We charge the notifications
            appNotifications.loadAll();

            // Polling
            // Every 3 minutes we check if there are no new notifications
            setInterval(function() {
                appNotifications.loadNumber();
            }, 180000);

            // Binding marking as read desktop
            $(".notification-read-desktop").on("click", function(event) {
                alert("");
                appNotifications.markAsReadDesktop(event, $(this));
            });
        },

        // Triggers the loading of the number and the notifs
        loadAll: function() {
            count = 0;
            $.ajax({
                type: "GET",
                url: "/api/notifications/all",
                success: function(data) {
                    notifications = data;

                    //counting Unread Notifications

                    for (let index = 0; index < notifications.length; index++) {
                        if (notifications[index]["read_at"] == null) {
                            count++;
                        }
                    }

                    oldCount = document.getElementById("notifiy_count");

                    if (count > oldCount.value) {
                        notifiy_sound.play();
                        oldCount.value = count;
                    }
                }
            }); // Or if there are no notifs

            // Notifiers are only charged if there is a difference
            if (count !== lastCount || count === 0) {
                appNotifications.load();
            }
            appNotifications.loadNumber();
        },

        // Loading mask for the icon and the badge
        badgeLoadingMask: function(show) {
            if (show === true) {
                // $("#notificationsBadge").html(appNotifications.badgeSpinner);
                $("#notificationsBadge").show();
                // Mobile
                $("#notificationsBadgeMobile").html(count);
                $("#notificationsBadgeMobile").show();
            } else {
                $("#notificationsBadge").html(count);
                if (count > 0) {
                    $("#notificationsIcon").removeClass("fa-bell-o");
                    $("#notificationsIcon").addClass("fa-bell");
                    $("#notificationsBadge").show();

                    // Mobile
                    $("#notificationsIconMobile").removeClass("fa-bell-o");
                    $("#notificationsIconMobile").addClass("fa-bell");
                    $("#notificationsBadgeMobile").show();
                } else {
                    $("#notificationsIcon").addClass("fa-bell-o");
                    $("#notificationsIcon").addClass("fa-bell");
                    $("#notificationsBadge").hide();
                    // Mobile
                    $("#notificationsIconMobile").addClass("fa-bell-o");
                    $("#notificationsBadgeMobile").hide();
                }
            }
        },

        // Indique si chargement des notifications
        loadingMask: function(show) {
            if (show === true) {
                $("#notificationAucune").hide();
                $("#notificationsLoader").show();
            } else {
                $("#notificationsLoader").hide();
                if (count > 0) {
                    $("#notificationAucune").hide();
                } else {
                    $("#notificationAucune").show();
                }
            }
        },

        // Chargement du nombre de notifications
        loadNumber: function() {
            appNotifications.badgeLoadingMask(true);

            // TODO : API Call pour récupérer le nombre

            // TEMP : pour le template
            setTimeout(function() {
                $("#notificationsBadge").html(count);
                appNotifications.badgeLoadingMask(false);
            }, 1000);
        },

        // Chargement de notifications
        load: function() {
            appNotifications.loadingMask(true);

            // On vide les notifs
            $("#notificationsContainer").html("");

            // Save the number of notifiers
            lastCount = count;

            // TEMP : pour le template
            setTimeout(function() {
                // TEMP : pour le template

                for (i = 0; i < notifications.length; i++) {
                    var template = $("#notificationTemplate").html();
                    template = template.replace(
                        "%%href%%",
                        "/user/notifications/read/" +
                            notifications[i]["id"] +
                            "/" +
                            notifications[i]["data"]["ticketSlug"]
                    );
                    template = template.replace(
                        "%%image%%",
                        "/images/avatars/" + notifications[i]["data"]["avatar"]
                    );
                    template = template.replace(
                        "%%texte%%",
                        notifications[i]["data"]["msg"]
                    );
                    template = template.replace(
                        "%%date%%",
                        diffForHumans(notifications[i]["data"]["time"], true)
                    );
                    //Check if is read or not
                    status = "read";
                    if (notifications[i]["read_at"] == null) {
                        status = "unread";
                    }
                    template = template.replace("%%status%%", status);

                    $("#notificationsContainer").append(template);
                }

                // On bind le marquage comme lue
                $(".notification-read").on("click", function(event) {
                    appNotifications.markAsRead(event, $(this));
                });

                // On arrête le chargement
                appNotifications.loadingMask(false);

                // On réactive le bouton
                $("#notifications-dropdown").prop("disabled", false);
            }, 1000);
        },

        // Marquer une notification comme lue
        markAsRead: function(event, elem) {
            // Permet de garde la liste ouverte
            event.preventDefault();
            event.stopPropagation();

            // Suppression de la notification
            elem.parent(".dropdown-notification").remove();

            // TEMP : pour le template
            count--;

            // Mise à jour du nombre
            appNotifications.loadAll();
        },

        // Marquer une notification comme lue version bureau
        markAsReadDesktop: function(event, elem) {
            // Permet de ne pas change de page
            event.preventDefault();
            event.stopPropagation();

            // Suppression de la notification
            elem.parent(".dropdown-notification").removeClass(
                "notification-unread"
            );
            elem.remove();

            // On supprime le focus
            if (document.activeElement) {
                document.activeElement.blur();
            }

            // TEMP : pour le template
            count--;

            // Mise à jour du nombre
            appNotifications.loadAll();
        },

        add: function() {
            lastCount = count;
            count++;
        },

        // Template du badge
        badgeSpinner:
            '<i class="fa fa-spinner fa-pulse fa-fw" aria-hidden="true"></i>'
    };

    appNotifications.init();

    setInterval(function() {
        appNotifications.loadAll();
    }, 30000);
});
