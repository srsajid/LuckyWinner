/**
 * Created by User on 4/25/14.
 */
$(function(){
    App.tabs.tabs = $("#tabs");
    App.global_event.trigger("tab-created");
    App.tabs.tabs.tabs();
    $("#change-password-btn").on("click", function() {
        util.editPopup("Change Password", App.baseUrl + "account/change-pass", {});
    });

})