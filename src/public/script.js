const colors = ["#FF5733", "#33FF57", "#5733FF", "#33BFFF", "#FF33BF"];
const changeColourButton = document.getElementById("changeColourButton");
const colorDisplay = document.getElementById("colourDisplay");
let colorIndex = 0;
function changeColor() {
        document.body.style.backgroundColor = colors[colorIndex];
        colorDisplay.textContent = "Current Color: " + colors[colorIndex];
        const p = document.createElement ("p")
        p. textContent = colors[colorIndex]
        document.body.append (p)
        colorIndex = (colorIndex + 1) % colors.length;
}
changeColourButton.addEventListener("click", changeColor);       