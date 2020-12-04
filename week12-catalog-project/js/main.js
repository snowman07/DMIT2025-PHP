// let resizeImage = document.querySelector (".square-img");

//     resizeImage.addEventListener("mouseover", function (e) {
//         console.log("test");
//         resizeImage.style.backgroundColor = "blue";
//     })

//     resizeImage.addEventListener("mouseout", function (e) {
//         //console.log("test");
//         resizeImage.style.backgroundColor = "";
//     })


// let imageCont = document.querySelector (".square-cont");
// let squareImg = document.querySelector ("#square-img");

//     squareImg.addEventListener("mouseover", function (e) {
//         if(e.target.classList.contains("square-img")){
//             console.log("test");
//             imageCont.style.backgroundColor = "blue";
//         }
//     })

//     resizeImage.addEventListener("mouseout", function (e) {
//         //console.log("test");
//         resizeImage.style.backgroundColor = "";
//     })


function bigImg(x) {
    //x.style.height = "auto";
    x.style.width = "auto";
}

function normalImg(x) {
    x.style.display = "block";
    x.style.width = "100%";
    x.style.height = "auto";
}