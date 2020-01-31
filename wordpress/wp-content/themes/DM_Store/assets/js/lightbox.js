class lightbox {
    static init(){
        const links = document.querySelectorAll(
            'a[href$=".png"], a[href$=".jng"], a[href$=".jpeg"]') 
            .forEach(link => link.addEvenLister('click', e =>
            {
                e.preventDefault()
                new Lightbox(e.currentTarget.getAttribute('href'))
            }))       
    }

/**
 * @param {string} url URL de l'image
 */

    constructor (url){
        const element = this.buildDOM(url)
        document.body.appendChild(element)

    }

    /**
 * @param {string} url URL de l'image
 * @returns {HTMLElement}
 */

buildDOM (url) {
    const dom = document.createElement('div')
    dom.classList.add('lightbox')
    dom.innerHTML = '<button class="lightbox__close">Close</button><button class="lightbox__next">Suivant</button><button class="lightbox__prev">Precedent</button><div class="lightbox_container"><img src=<?php echo $product->get_image();?></div>'
    return dom
    }

}





lightbox.init()