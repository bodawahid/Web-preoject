{
    window.addEventListener("scroll", function() {
        var header = document.querySelector("nav.header");
        header.classList.toggle("sticky", window.scrollY > 75);

    })

    const nav = document.querySelector(".header");
    let lastScrollY = window.scrollY;
    window.addEventListener("scroll", () => {
        if (lastScrollY < window.scrollY) {
            nav.classList.add("header--hidden");
        } else {
            nav.classList.remove("header--hidden");
        }

        lastScrollY = window.scrollY;
    });
    console.log("This works");
    let scrollTopButton = document.getElementById("scrollTopButton");

    scrollTopButton.addEventListener("click", () => {
        // Scroll smoothly to the top of the page
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });



}