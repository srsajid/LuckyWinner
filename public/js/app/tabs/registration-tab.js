/**
 * Created by User on 8/4/14.
 */
var _r = App.tabs.registration = new TableTab("registration");
_r.afterTableLoad = function(event, ui) {
    ui.panel.find(".select-winner").on("click", function() {
        util.editPopup("Winner of the last week", App.baseUrl + "reg/winner", {})
    })
}

