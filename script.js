async function sendMessage() {
    const userInput = document.getElementById("user-input").value.trim();
    const chatBox = document.getElementById("chat-box");

    if (userInput === "") return;

    const userMessage = document.createElement("div");
    userMessage.classList.add("user-message");
    userMessage.textContent = "Ti: " + userInput;
    chatBox.appendChild(userMessage);

    try {
        const response = await fetch("get_response.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ message: userInput })
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();
        const botMessage = document.createElement("div");
        botMessage.classList.add("bot-message");
        botMessage.innerHTML = "Bot: " + data.response; 
        chatBox.appendChild(botMessage);
    } catch (error) {
        console.error("Greška prilikom dobivanja odgovora:", error);
        const errorMessage = document.createElement("div");
        errorMessage.classList.add("bot-message");
        errorMessage.textContent = "Bot: Došlo je do greške prilikom dobivanja odgovora.";
        chatBox.appendChild(errorMessage);
    }

    document.getElementById("user-input").value = "";
    chatBox.scrollTop = chatBox.scrollHeight;
}
