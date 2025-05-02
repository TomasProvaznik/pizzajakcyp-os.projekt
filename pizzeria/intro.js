function hideIntro() {
    const intro = document.getElementById("intro");
    const content = document.querySelector(".content");
    const footer = document.querySelector(".footer");

    intro.classList.add("split");
    setTimeout(() => {
        intro.style.display = "none";
        content.style.display = "block";
        document.body.style.overflow = "auto";
    }, 1000); 
}


