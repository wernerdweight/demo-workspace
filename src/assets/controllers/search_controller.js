import { Controller } from '@hotwired/stimulus';

/*
* The following line makes this controller "lazy": it won't be downloaded until needed
* See https://github.com/symfony/stimulus-bridge#lazy-controllers
*/
/* stimulusFetch: 'lazy' */
export default class extends Controller {
    static targets = ['modal'];

    connect() {
        console.log('Search Controller Connected!');
    }

    open(event) {
        event.preventDefault(); // Zabrání přesměrování
        if (this.hasModalTarget) {
            console.log(this.modalTarget);
            this.modalTarget.showModal(); // Otevře modal
        } else {
            console.error('Modal target not found!');
        }
    }

    close() {
        if (this.hasModalTarget) {
            this.modalTarget.close(); // Zavře modal
        }
    }
}
