class Lightbox {
    static init(){
        const links = document.querySelectorAll(
            '.showcase_pics') 
            .forEach(link => link.addEventListener('click', e =>
            {
                e.preventDefault()
                new Lightbox(e.currentTarget.getAttribute('href'))
            }))       
    }


    constructor(url) {
         this.element = this.buildDOM(url)
        //  this.loadImage(url)
        document.body.appendChild(this.element)
    }

    /**
   * @param {string} url URL de l'image
   */
  // loadImage (url) {
  //   this.url = null
  //   const image = new Image()
  //   const container = this.element.querySelector('.lightbox__container')
  //   const loader = document.createElement('div')
  //   loader.classList.add('lightbox__loader')
  //   container.innerHTML = ''
  //   container.appendChild(loader)
  //   image.onload = () => {
  //     container.removeChild(loader)
  //     container.appendChild(image)
  //     this.url = url
  //   }
  //   image.src = url
  // }


    close (e) {
      e.preventDefault()
      this.element.classlist.add('fadeOut')
      window.setTimeout(() => {
        this.element.parentElement.removeChild(this.element)
      }, 500);
    }

    /**
   * @param {MouseEvent|KeyboardEvent} e 
   */
  next (e) {
    e.preventDefault()
    let i = this.images.findIndex(image => image === this.url)
    if (i === this.images.length - 1) {
      i = -1
    }
    this.loadImage(this.images[i + 1])
  }

  /**
   * @param {MouseEvent|KeyboardEvent} e 
   */
  prev (e) {
    e.preventDefault()
    let i = this.images.findIndex(image => image === this.url)
    if (i === 0) {
      i = this.images.length
    }
    this.loadImage(this.images[i - 1])
  }


    buildDOM(url) {
    const dom = document.createElement('div')
    dom.classList.add('lightbox')
    dom.innerHTML = `<button class="lightbox__close"></button>
        <button class="lightbox__next"></button>
        <button class="lightbox__prev"></button>
        <div class="lightbox__container"></div>`
    dom.querySelector('.lightbox__close').addEventListener('click', this.close.bind(this))
    dom.querySelector('.lightbox__next').addEventListener('click', this.next.bind(this))
    dom.querySelector('.lightbox__prev').addEventListener('click', this.prev.bind(this))
    return dom

}
}
Lightbox.init()