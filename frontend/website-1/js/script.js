
//Header Backgroung  --------(1)
let heightHireo = document.querySelector('.intro');
let header = document.querySelector('header');
let btn = document.getElementById("btn_top");

let nums = document.querySelectorAll(".stats .box .num");
let statsSection = document.querySelector(".stats");
let started = false;

window.onscroll = function () {

    let windowScrollTop = this.pageYOffset;
    let herioOuterHeight = heightHireo.offsetHeight;
    let headerHeight = header.offsetHeight;
    if ((herioOuterHeight - headerHeight) < windowScrollTop) {
        header.classList.add('scroll');
    } else {
        header.classList.remove('scroll');
    }

    scrollTop();

    skillsRatio();


    // Stats Increase Number
    if (window.scrollY >= statsSection.offsetTop - statsSection.offsetHeight) {
        if (!started) {
            nums.forEach((num) => startCount(num));
        }
        started = true;
    }
}
function startCount(el) {

    let numData = el.dataset.num;
    let counter = setInterval(() => {
        el.textContent++;
        console.log(el.textContent + " " + numData);
        if (el.textContent == numData) {
            console.log('clear');
            clearInterval(counter);
        }

    }, 5);
}

// Scroll Top  ---------(2)
function scrollTop() {
    if (window.scrollY > 721.6) {
        // btn.style.display = "block";
        btn.style.bottom = "20px"
    } else {
        // btn.style.display = "none";
        btn.style.bottom = "-80px"
    }
}
btn.onclick = function () {
    window.scrollTo({
        left: 0,
        top: 0,
        behavior: "smooth",
    });
};


// Smooth To Section ---------(3)
const allLinks = document.querySelectorAll("nav .menu li a");
console.log(allLinks);
function scrollToSomeWhere(elements) {
    elements.forEach(ele => {
        ele.addEventListener("click", (e) => {
            e.preventDefault();
            console.log(e.target.dataset.section);
            document.querySelector(e.target.dataset.section).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
}
scrollToSomeWhere(allLinks);



// Filter Images     ---------(4)
let fw = document.querySelectorAll('.featured-work ul li');
let imgDiv = document.querySelectorAll('.shuffle-imgs .image');
let shuffle_imgs = document.querySelector('.shuffle-imgs');

function setSuffleImages(arr) {
    arr.forEach(function (img) {
        shuffle_imgs.appendChild(img);
    });
}

fw.forEach(function (li) {
    li.addEventListener('click', function (event) {
        shuffle_imgs.innerHTML = '';
        handelActive(event);
        let li_class_name = event.target.dataset.class;
        if (li_class_name === 'all') {
            setSuffleImages(imgDiv);
        } else {
            const results = [...imgDiv].filter(img => li_class_name === img.children[0].className);
            setSuffleImages(results);
        }
    });
});



function handelActive(ev) {
    //Remove Active Class From All Childrens
    ev.target.parentElement.querySelectorAll(".active").forEach(element => {
        element.classList.remove("active");
    });

    //Add Active Class on Self
    ev.target.classList.add("active");
}



// Form Filter        ---------(5)
let form = document.querySelector('.contact-form');
let username = document.getElementById('username');
let email = document.getElementById('email');
let comment = document.getElementById('comment');

form.addEventListener('submit', e => {
    e.preventDefault();
    validateInputs();
});

function setError(element, message) {
    let inputControl = element.parentElement;
    let errorMessage = inputControl.querySelector('.error');

    errorMessage.innerText = message;
    inputControl.classList.add('error');
}

function setSuccess(element) {
    let inputControl = element.parentElement;
    let errorMessage = inputControl.querySelector('.error');

    errorMessage.innerText = '';
    inputControl.classList.remove('error');
};

const isValidEmail = email => {
    const rex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return rex.test(String(email).toLowerCase());
}

function validateInputs() {
    let usernameValue = username.value.trim();
    let emailValue = email.value.trim();
    let commentValue = comment.value;

    if (usernameValue == '') {
        setError(username, 'Username is requried');
    } else {
        setSuccess(username)
    }

    if (emailValue == '') {
        setError(email, 'Email is requried');
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Invalid email address');
    } else {
        setSuccess(email);
    }

    if (commentValue == '') {
        setError(comment, 'Comment is requried');
    } else if (commentValue.length < 10) {
        setError(comment, 'Comment must be at least 10 character.');
    } else {
        setSuccess(comment);
    }

}



// Loading Screen     ---------(6)  
let loader = document.querySelector('.loader-bg');
window.addEventListener("load", function () {
    // setTimeout(function () {
    loader.style.display = "none";
    // }, 1500)
})


// Select-Landing-Page-Element
let landingPage = document.querySelector(".intro");

//Get Array pf Imgs
let imgsArray = ["img1.jpg", "img2.jpg", "img3.jpg", "img4.jpg"];

function randomizeImgs() {
    setInterval(() => {
        let randonNumber = Math.floor(Math.random() * imgsArray.length);
        landingPage.style.backgroundImage = ' url("images/' + imgsArray[randonNumber] + '")';

    }, 5000)
}

randomizeImgs();

let ourSkills = document.querySelector(".our-skills");
function skillsRatio() {
    let skillsOffsetTop = ourSkills.offsetTop;
    let skillsOuterHeight = ourSkills.offsetHeight;
    let windowHeight = this.innerHeight;
    let windowScrollTop = this.pageYOffset;
    // console.log(windowHeight);
    if (windowScrollTop > (skillsOffsetTop + skillsOuterHeight - windowHeight)) {
        // console.log("kkk");
        let allSkills = document.querySelectorAll(".skill .skill-progress span");
        allSkills.forEach(skill => {
            skill.style.width = skill.dataset.progress;
        });
    }
}

let toggle_menu = document.querySelector(".toggle-menu");
toggle_menu.onclick = function () {
    let menu_list = document.querySelector(".menu-list");
    menu_list.classList.toggle('active');
}

