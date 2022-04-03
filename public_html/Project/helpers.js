function flash(message = "", color = "info") {
    let flash = document.getElementById("flash");
    //create a div (or whatever wrapper we want)
    let outerDiv = document.createElement("div");
    outerDiv.className = "row justify-content-center";
    let innerDiv = document.createElement("div");

    //apply the CSS (these are bootstrap classes which we'll learn later)
    innerDiv.className = `alert alert-${color}`;
    //set the content
    innerDiv.innerText = message;

    outerDiv.appendChild(innerDiv);
    //add the element to the DOM (if we don't it merely exists in memory)
    flash.appendChild(outerDiv);
}

function is_valid_email(email)
{
    let regex = new RegExp('^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$');
    if (regex.test(email))
    {
        return true;
    }
        return false;
}

function is_valid_password(password)
{
    return password.length >= 8;
}

function is_valid_username(username)
{
    let regex = new RegExp('^[a-z0-9_-]{3,16}$');
    if (regex.test(username))
    {
        return true;
    }
        return false;
}