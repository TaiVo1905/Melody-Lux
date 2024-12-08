if (window.location.href.includes("category")) {
    const $=document.querySelector.bind(document);
    const $$=document.querySelectorAll.bind(document);
    document.addEventListener("DOMContentLoaded", () => {
    $('.sidebar_center .bar_title:nth-child(2)').classList.add("active");
})
}
