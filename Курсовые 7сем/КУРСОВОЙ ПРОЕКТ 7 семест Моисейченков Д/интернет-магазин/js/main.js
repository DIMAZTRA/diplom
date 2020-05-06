$(function () {


    $('.ret-star').rateYo({
        rating: 5,
        starWidth: "12px",
        readOnly: true
    });
    $('.icon-th-list').on('click', function () {
        $('.product-page__items .product__item').addClass('list');
        $('.icon-th-list').addClass('active');
        $('.icon-th-large').removeClass('active');
    });
    $('.icon-th-large').on('click', function () {
        $('.product-page__items .product__item').removeClass('list');
        $('.icon-th-large').addClass('active');
        $('.icon-th-list').removeClass('active');
    });
    $('.menu__btn').on('click', function () {
        $('.menu__list').slideToggle();
    });
    $('.header__btn-menu').on('click', function () {
        $('.header__box').toggleClass('active');
    });

    $('.product-one__tabs .tab,.settings__tabs .tab').on('click', function (event) {
        var id = $(this).attr('data-id');
        $('.product-one__tabs,.settings__tabs').find('.tab-item').removeClass('active-tab').hide();
        $('.product-one__tabs .tabs,.settings__tabs .tab').find('.tab').removeClass('active');
        $(this).addClass('active');
        $('#' + id).addClass('active-tab').fadeIn();
        return false;
    });

    $('input[type=file],select').styler();


    $('.product-slider__inner').slick({
        dots: true,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [{
            breakpoint: 1900,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 1300,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 900,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },


        ]
    });

    $(".js-range-slider").on('change', function () {
        $inp = $(this)
        from = $inp.data("from");
        to = $inp.data("to");

    });
    $(".js-range-slider").ionRangeSlider({
        type: "double",
        min: 0,
        max: 1000,
        from: 0,
        to: 600,
        prefix: "$",

    }
    );
    var to = 600
    var from = 0
    let products = document.querySelectorAll('.product-page__items .product__item')
    let types = document.querySelector('.category__list')

    let rangebtn = document.querySelector('.rangebtn')
    rangebtn.addEventListener('click', function (event) {
        let price = document.querySelectorAll('.product__item-price-inner')
        
        let z = 0;
        for (let i = 0; i < price.length; i++) {

            if (Number.parseInt(price[i].textContent.slice(1)) >= +from && Number.parseInt(price[i].textContent.slice(1)) <= +to) {

                products[i].removeAttribute('id');
                products[i].setAttribute('id', 1);
                products[i].classList.remove('hide');
                products[i].classList.add('show');
            } else {
                products[i].classList.remove('show')
                products[i].classList.add('hide');
                products[i].removeAttribute('id');
            }
            

            if (products[i].hasAttribute('id') && z < num) {

                products[i].classList.remove('hide')
                products[i].classList.add('show');
                z++
            } else {
                products[i].classList.remove('show')
                products[i].classList.add('hide');
            }

        }
        let countnumer = document.querySelectorAll('.pagination__list-link')

        for (let j = 0; j < countnumer.length; j++) {
            countnumer[j].classList.remove('active')
        }
        countnumer[0].classList.add('active')
        let counter = 0;
        let k = countprod(products)
        
        for (let j = 0; j < countnumer.length; j++) {
          
            if (counter < Math.ceil(k / num)) {
                countnumer[j].style.display = 'flex'


            }
            else {
                countnumer[j].style.display = 'none'
            }
            counter++;
        }

    })



})

let num = 3;


$(function () {
    let products = document.querySelectorAll('.product-page__items .product__item')
    let types = document.querySelector('.category__list')


    types.addEventListener('click', function (event) {
        let countnumer = document.querySelectorAll('.pagination__list-link')

        for (let j = 0; j < countnumer.length; j++) {
            countnumer[j].classList.remove('active')
        }
     
        var tar = event.target

        let z = 0;
        let countt = 1;
        for (let i = 0; i < products.length; i++) {
            countnumer[0].classList.add('active')

            if (products[i].classList.contains(tar.textContent.toLowerCase().trim())) 
            {
                products[i].classList.remove('hide');
                products[i].classList.add('show');
                products[i].removeAttribute('id');
                products[i].setAttribute('id', countt);
                countt++;

            } else {
                products[i].classList.remove('show')
                products[i].classList.add('hide');
                products[i].removeAttribute('id');
            }

            if (tar.textContent.toLowerCase().trim() === 'all') {



                products[i].classList.remove('hide');
                products[i].classList.add('show');
                products[i].removeAttribute('id');
                products[i].setAttribute('id', 1);//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1
                if (products[i].hasAttribute('id') && z < num) {

                    products[i].classList.remove('hide')
                    products[i].classList.add('show');
                } else {
                    products[i].classList.remove('show')
                    products[i].classList.add('hide');
                }


            }
            z++
        }

       
        let counter = 0;
        let k = countprod(products)

        for (let j = 0; j < countnumer.length; j++) {
            
            if (counter < Math.ceil(k / num)) {
                countnumer[j].style.display = 'flex'


            }
            else {
                countnumer[j].style.display = 'none'
            }
            counter++;
        }

    })



    let x = 0;
    for (let i = 0; i < products.length; i++) {
        if (products[i].hasAttribute('id') && x < num) {

            products[i].classList.remove('hide')
            products[i].classList.add('show');
        } else {
            products[i].classList.remove('show')
            products[i].classList.add('hide');
        }
        x++
    }
})

$(function(){
    let products = document.querySelectorAll('.product-page__items .product__item')
    let numer = document.querySelector('.pagination__list')
    let countnumer = document.querySelectorAll('.pagination__list-link')
    countnumer[0].classList.add('active')
    let counter = 0;
    let k = countprod(products)
    for (let j = 0; j < countnumer.length; j++) {
      
        if (counter < Math.ceil(k / num)) {
            countnumer[j].style.display = 'flex'


        }
        else {
            countnumer[j].style.display = 'none'
        }
        counter++;
    }
    numer.addEventListener('click', function (event) {

        let el = event.target;
        let tar = el.textContent;

        for (let j = 0; j < countnumer.length; j++) {
            if (tar == countnumer[j].textContent) {
                countnumer[j].classList.add('active')
            } else {
                countnumer[j].classList.remove('active')
            }


        }
        
      let COUNT2=tar*num-1;
      let COUNT1=COUNT2-num+1;
      console.log(COUNT2)
      console.log(COUNT1)

        for (let i = 0; i < products.length; i++) {
            if (products[i].hasAttribute('id')&& i>= COUNT1 && i <= COUNT2) {

                products[i].classList.remove('hide')
                products[i].classList.add('show');

            } else {
                products[i].classList.remove('show')
                products[i].classList.add('hide');
            }
        }

    })


})
$(function () {
    $('#auth_button').click(function (event) {
        event.preventDefault()
        let login = $('#auth_login').val()
        let password = $('#auth_password').val()
        $.ajax({
            type: "POST",
            url: "include/auth.php",
            data: "login=" + login + "&password=" + password,
            dataType: "html",
            cache: false,
            success: function (data) {

                console.log(data)
                if (data.trim() == 'yes_auth') {
                    $('.incorrect-logpas').addClass('hide')
                    location.reload();
                    window.location.href = "index.php"

                } else {
                    $('.incorrect-logpas').addClass('show')
                    $('#modal').addClass('show')
                }
            }
        })
    })
    $('.lost__pass').click(function () {
        $('.forgotpassword').toggleClass('show')
    })
    $('#forgot_button').click(function (event) {
        event.preventDefault()
        let recall_email = $('#forgot_email').val();
        if (recall_email == '' || recall_email.length > 20) {
            $('.incorrect-email').addClass('show')
        } else {
            $.ajax({
                type: "POST",
                url: "include/remindpassword.php",
                dataType: "html",
                cache: false,
                data: "email=" + recall_email,

                success: function (data) {
                    console.log(data)
                    if (data.trim() == 'yes') {

                        $('.incorrect-email').removeClass('show')
                        $('.check_mailbox').addClass("show")

                    } else {
                        $('.incorrect-email').addClass('show')
                    }
                }
            })
        }

    })
    // $('#up_submit').click(function (event) {
    //     event.preventDefault()
    //     let login = $('#up_login').val()
    //     let prevpassword = $('#up_prevpassword').val()
    //     let password = $('#up_password').val()
    //     let email = $('#up_email').val()
    //     let country = $('#up_country').val()
    //     let fname = $('#up_fname').val()
    //     let lname = $('#up_lname').val()
    //     $.ajax({
    //         type: "POST",
    //         url: "include/profile_update.php",
    //         data: "login=" + login + "&prevpassword=" + prevpassword+"&password=" + password+"&fname=" + fname+"&lname=" + lname+"&country=" + country+"&email=" + email,
    //         dataType: "html",
    //         cache: false,
    //         success: function (data) {

    //             console.log(data)
    //             if (data.trim() == 'yes_auth') {
    //                 $('.incorrect-logpas').addClass('hide')
    //                 location.reload();

    //             } else {
    //                 $('.incorrect-logpas').addClass('show')
    //                 $('#modal').addClass('show')
    //             }
    //         }
    //     })
    // })



})
$(function () {
    $('.product__item-btn').click(function () {
        let id = $(this).attr("tid")
        
        $.ajax({

            type: "POST",
            dataType: "html",
            cache: false,
            data: "id=" + id,
         
            url: "include/addtocart.php",
            success: function (data) {
                if (data == '0') {
                    $('#count_productsincart').html("0")
                } else {
                    $('#count_productsincart').html(data.trim())
                }
                
            }
        })
        
    })
})

$(function () {
    $('#header__btn-logout').click(function () {
        $.ajax({
            type: "POST",
            dataType: "html",
            cache: false,
            url: "include/unsetauth.php",
            success: function (data) {
                if (data.trim() == 'logout') location.reload();
            }
        })
    })
})

function countprod(products) {
    let k = 0
    for (let i = 0; i < products.length; i++) {
        if (products[i].hasAttribute('id')) k++
    }
    return k
}


$(function () { var mixer = mixitup('.products__inner-box'); })







