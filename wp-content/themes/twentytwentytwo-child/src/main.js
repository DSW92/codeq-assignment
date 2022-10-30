window.addEventListener('DOMContentLoaded', (event) => {
    
    // Ajax call handler for employees block
    const loadBtn = document.querySelector('.employees-module__button');
    const employeesContainer = document.querySelector('.employees-module__data');

    loadBtn.addEventListener('click', () => {
        load_employees();
    })

    function load_employees() {
        fetch("http://localhost:8888/codeq-assignment/wp-admin/admin-ajax.php", {
            method: "post",
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: "action=get_employees_list"
        })
        .then( res => res.text() )
        .then( data => employeesContainer.innerHTML = data )
        .catch( error => console.log(error) )
    }

});

// jQuery(document).ready(function($) {
//     $('.employees-module__button').click(function() {
//         load_employees();
//     });

//     function load_employees() {
//         $.ajax({
//             url: "http://localhost:8888/codeq-assignment/wp-admin/admin-ajax.php",
//             type: "POST",
//             data: {action: 'get_employees_list'},
//             success: function(response) {
//                 $('.employees-module__data').html(response);
//             }
//         })
//     }
// });