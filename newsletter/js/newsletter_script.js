let saveComment = document.querySelector('#newsletter_form');
saveComment.addEventListener('submit', doAjax);

function doAjax(event)
{
    event.preventDefault();

    var option=[]
    
    var opt1 = document.getElementById("opt1")
    if(opt1.checked)
    {
        option.push(opt1.value);
    }

    var opt2 = document.getElementById("opt2")
    if(opt2.checked)
    {
        option.push(opt2.value);
    }

    var opt3 = document.getElementById("opt3")
    if(opt3.checked)
    {
        option.push(opt3.value);
    }

    var opt4 = document.getElementById("opt4")
    if(opt4.checked)
    {
        option.push(opt4.value);
    }

    alert(option);

    let formData = new FormData(saveComment);

    fetch(saveComment.getAttribute('action'),
    {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data =>
        {
            if(data.type === "success")
            {
                const success = document.querySelector('#success');
                success.innerHTML = `Your subscription is registered!`;

                console.log(data.message);
            }
            else 
            {
                alert("Your comment could not be added");
            }
        })
        .catch((error) =>
        {
            console.error('Error:', error);
        });
}