const productContainers = [...document.querySelectorAll('.product-container')];
const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
const preBtn = [...document.querySelectorAll('.pre-btn')];

productContainers.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;
    let intervalId; // Variável para armazenar o ID do intervalo

    // Função para avançar automaticamente
    function autoScrollNext() {
        item.scrollLeft += containerWidth;

        // Verifique se o carrossel chegou ao final e volte ao início
        if (item.scrollLeft + containerWidth >= item.scrollWidth) {
            item.scrollLeft = 0;
        }
    }

    // Função para retroceder automaticamente
    function autoScrollPrev() {
        item.scrollLeft -= containerWidth;

        // Verifique se o carrossel voltou ao início e vá para o final
        if (item.scrollLeft <= 0) {
            item.scrollLeft = item.scrollWidth - containerWidth;
        }
    }

    // Iniciar a rolagem automática após um intervalo de tempo
    function startAutoScroll() {
        intervalId = setInterval(autoScrollNext, 3000); // Avança a cada 3 segundos
    }

    // Parar a rolagem automática quando o mouse estiver sobre a área do produto
    item.addEventListener('mouseenter', () => {
        clearInterval(intervalId);
    });

    // Retomar a rolagem automática quando o mouse sair da área do produto
    item.addEventListener('mouseleave', () => {
        startAutoScroll();
    });

    // Configurar cliques nos botões
    nxtBtn[i].addEventListener('click', () => {
        autoScrollNext();
    });

    preBtn[i].addEventListener('click', () => {
        autoScrollPrev();
    });

    // Iniciar a rolagem automática quando a página carregar
    startAutoScroll();
});

class MobileNavbar {
  constructor(mobileMenu, navList, navLinks) {
    this.mobileMenu = document.querySelector(mobileMenu);
    this.navList = document.querySelector(navList);
    this.navLinks = document.querySelectorAll(navLinks);
    this.activeClass = "active";

    this.handleClick = this.handleClick.bind(this);
  }

  animateLinks() {
    this.navLinks.forEach((link, index) => {
      link.style.animation
        ? (link.style.animation = "")
        : (link.style.animation = `navLinkFade 0.5s ease forwards ${
            index / 7 + 0.3
          }s`);
    });
  }

  handleClick() {
    this.navList.classList.toggle(this.activeClass);
    this.mobileMenu.classList.toggle(this.activeClass);
    this.animateLinks();
  }

  addClickEvent() {
    this.mobileMenu.addEventListener("click", this.handleClick);
  }

  init() {
    if (this.mobileMenu) {
      this.addClickEvent();
    }
    return this;
  }
}

const mobileNavbar = new MobileNavbar(
  ".mobile-menu",
  ".nav-list",
  ".nav-list li",
);
mobileNavbar.init();

let carrinhoItems = 0;

  const buttons = document.querySelectorAll(".card-btn, .featured-card-btn"); // Seleciona todos os botões com as classes "card-btn" e "featured-card-btn"
  const carrinhoIcon = document.querySelector(".cart-icon");
  const cartNotification = carrinhoIcon.querySelector(".cart-notification"); // Seleciona o elemento de notificação do carrinho

  buttons.forEach(button => {
    button.addEventListener("click", () => {
      carrinhoItems++; // Incrementa o contador
      cartNotification.textContent = carrinhoItems; // Atualiza o número no elemento de notificação
      alert("Produto adicionado ao carrinho!");
    });
  });
