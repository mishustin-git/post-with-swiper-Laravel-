function toggleSideBar(){
    let wrapper = document.getElementById("wrapper");
    if (wrapper.classList.contains("toggled")){
        wrapper.classList.remove("toggled");
    }
    else{
        wrapper.classList.add("toggled") 
    }
}
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById("menu-toggle").addEventListener('click',toggleSideBar);
});