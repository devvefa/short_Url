
$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");

});

function changeThemeMode() {
    const formData = new FormData();

    var radioValue = $("input[name='theme']:checked").val();
    formData.append(radioValue);

    fetch('/admin', {
        method: 'POST',

        body : formData
    }).catch(err=>{
        console.log(err);
    })
}



