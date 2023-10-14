let carrinhoItems = 0;

const buttons = document.querySelectorAll(".comprar"); // Seleciona todos os botões com a classe "comprar"
const carrinhoIcon = document.querySelector(".cart-icon");
const cartNotification = carrinhoIcon.querySelector(".cart-notification");

buttons.forEach(button => {
    button.addEventListener("click", () => {
        carrinhoItems++; // Incrementa o contador
        cartNotification.textContent = carrinhoItems; // Atualiza o número no elemento de notificação
        alert("Produto adicionado ao carrinho!");
    });
});
