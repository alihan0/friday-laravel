// mellow-modal.js

class MellowModal {
    constructor(params) {
      this.id = params.id || 'mellowModal';
      this.size = params.size || 'modal-md';
      this.backdrop = params.backdrop || false;
      this.showCloseButton = params.showCloseButton || true;
      this.title = params.title || '';
      this.header = params.header !== undefined ? params.header : true;
      this.footer = params.footer !== undefined ? params.footer : true;
      this.confirmButton = params.showConfirmButton !== undefined ? params.showConfirmButton : true;
      this.confirmButtonType = params.confirmButtonType !== undefined ? params.confirmButtonType : "success";
      this.confirmButtonText = params.confirmButtonText !== undefined ? params.confirmButtonText : "Confirm";
      this.buttons = params.buttons !== undefined ? params.buttons : '';
      this.content = params.content || '';
      this.animation = params.animation || 'fade';
      this.allowFullscreen = params.allowFullscreen || false;
      this.css = params.css || '';
  
      this.modal = null;
    }
  
    createModalElement() {
      const modalElement = document.createElement('div');
      modalElement.classList.add('modal', this.animation);
      modalElement.setAttribute('id', this.id);
  
      const modalDialog = document.createElement('div');
      modalDialog.classList.add('modal-dialog', this.size);
      modalDialog.setAttribute('role', 'document');
  
      const modalContent = document.createElement('div');
      modalContent.classList.add('modal-content');
  
      if (this.header) {
        const modalHeader = document.createElement('div');
        modalHeader.classList.add('modal-header');
        modalHeader.innerHTML = `
          <h5 class="modal-title">${this.title}</h5>
          ${this.showCloseButton ? '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' : ''}
        `;
        modalContent.appendChild(modalHeader);
      }
  
      const modalBody = document.createElement('div');
      modalBody.classList.add('modal-body');
      modalBody.innerHTML = this.content;
      modalContent.appendChild(modalBody);
  
      if (this.footer) {
        const modalFooter = document.createElement('div');
        modalFooter.classList.add('modal-footer');
        modalFooter.innerHTML = this.confirmButton ? `${this.buttons} <button type="button" class="btn btn-${this.confirmButtonType}" id="${this.id}Btn">${this.confirmButtonText}</button>` : `${this.buttons}`;
        modalContent.appendChild(modalFooter);
      }
  
      modalDialog.appendChild(modalContent);
      modalElement.appendChild(modalDialog);
  
      document.body.appendChild(modalElement);
  
      if (this.allowFullscreen) {
        modalDialog.classList.add('modal-fullscreen');
      }
  
      if (this.css) {
        modalElement.style.cssText = this.css;
      }
  
      return modalElement;
    }
  
    fire() {
      this.modal = this.createModalElement();
  
      const options = {
        backdrop: this.backdrop ? 'static' : true,
      };
  
      const modal = new bootstrap.Modal(this.modal, options);
      modal.show();

    }
  
    hide() {
      const modal = new bootstrap.Modal(this.modal);
      modal.hide();
    }
  
    destroy() {
      this.modal.remove();
    }
  }
  
  module.exports = MellowModal;