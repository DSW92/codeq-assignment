window.addEventListener('DOMContentLoaded', (event) => {
    
    // Ajax call handler for employees block
    const loadBtn = document.querySelector('.employees-module__button');
    const employeesContainer = document.querySelector('.employees-module__data');

    loadBtn.addEventListener('click', () => {
        load_employees(1);
    })

    function load_employees(paged) {
        fetch("http://localhost:8888/codeq-assignment/wp-admin/admin-ajax.php", {
            method: "post",
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: "action=get_employees_list" + "&paged=" + paged
        })
        .then( res => res.text() )
        .then( data => employeesContainer.innerHTML = data )
        .catch( error => console.log(error) )
    }


    // observe DOM changes made with AJAX call
    function waitForElm(selector) {
        return new Promise(resolve => {
            if (document.querySelector(selector)) {
                return resolve(document.querySelectorAll(selector));
            }
    
            const observer = new MutationObserver(mutations => {
                if (document.querySelector(selector)) {
                    resolve(document.querySelectorAll(selector));
                    observer.disconnect();
                }
            });
    
            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
        });
    }
    
    // Attempt to convert my JQuery pagination solution for vanilla JS. I've experienced a bug, which makes my pagination link work only one time, and every other attempt
    // to use pagination fails (preventDefault not working). I suspect that MutationObserver resets load_employees to default state, but I need to investigate it further :)

    // waitForElm('.pagination > a').then((elm) => {
    //     elm.forEach(elm => {
    //         elm.addEventListener('click', (e) => {
    //             e.preventDefault();
    //             if (elm.classList.contains('prev') || elm.classList.contains('next')) {
    //                 paginateNum = elm.querySelector('.prev-next').dataset.attr;
    //                 load_employees(paginateNum);
    //             } else {
    //                 paginateNum = elm.innerText;
    //                 load_employees(paginateNum);
    //             }
    //         })
    //     })
    // });


    // JQuery AJAX dynamic pagination - because non-JQuery solution gives me a bug, which I explain above.
    jQuery(document).ready(function($) {
        $('.employees-module__data').on('click', ".pagination a", function(e) {
            e.preventDefault();
            $(this).addClass('kliknięty');
            if ($(this).hasClass('prev') || $(this).hasClass('next')) {
                paginateNum = $(this).find('.prev-next').data('attr');
                load_employees(paginateNum);
            } else {
                paginateNum = $(this).text();
                load_employees(paginateNum);
            }
        })

    });

});

