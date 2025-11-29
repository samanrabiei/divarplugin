function copyText(event, id) {
    let text = document.getElementById(id).textContent;

    navigator.clipboard.writeText(text).then(() => {
        let btn = event.target;
        btn.textContent = "کپی شد!";
        setTimeout(() => {
            btn.textContent = "کپی";
        }, 1200);
    });
}
