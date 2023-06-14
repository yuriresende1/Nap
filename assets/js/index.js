let buttonSend = document.getElementById('buttonSend')
buttonSend.addEventListener('click', () => {
  
  let canvas = document.getElementById("assinatura")
  let context = canvas.getContext("2d")
  let imageData = canvas.toDataURL()

  let hiddenInput = document.createElement("input")
  hiddenInput.setAttribute("type", "hidden")
  hiddenInput.setAttribute("name", "canvas_image")
  hiddenInput.setAttribute("value", imageData)

  let form = document.getElementById("my-form") 
  form.appendChild(hiddenInput)
})