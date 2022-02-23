const date = new Date()
let currentDate = date.getDate()
let currntMonth = date.getMonth()
let currentYear = date.getFullYear()
let currentDay = date.getDay()
const dayArr=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]
const monthArr = ["January","February","March","April","May","June","July","August","September","October","November","December"]

const navLink = document.querySelectorAll('.nav-link')
const search_icon = document.querySelectorAll('.search_icon')

    // , ${currentYear}
window.addEventListener('load',()=>{
    document.querySelector('#date_time').textContent = `${dayArr[currentDay]},${monthArr[currntMonth]} ${currentDate}`
})


//show search box
search_icon.forEach(search=>{
    search.addEventListener('click',()=>{
        document.querySelector('#search_box').classList.toggle('show')
    })
})
