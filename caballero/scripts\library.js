/*
  scripts/library.js
  Caballero Website Manager
  Jason M. Knight
  7 February 2023
*/

{ // "back to top" show/hide

  let
    /*
      It sucks to track the last set value, but classList
      methods are comparitively slow since they go to the
      DOM. It's better to track it here and return
      prematurely in the event handler since it gets called
      EVERY time we scroll or resize the window!
    */
    lastScroll = false;
  const
    backToTop = document.getElementById("backToTop"),
    scrollFix = document.getElementById("scrollFix");
    sizeEvent = (e) => {
      let newScroll = scrollFix.scrollTop > 0 ? "remove" : "add";
      if (lastScroll === newScroll) return;
      backToTop.classList[newScroll]("hideScroll");
      lastScroll = newScroll;
    };
    
  addEventListener("load", sizeEvent);
  addEventListener("resize", sizeEvent);
  scrollFix.addEventListener("scroll", sizeEvent);
  
} // "back to top" show/hide

{ // modal helpers

  let modalDepth = 0;
  
  const

    getHashModal = () => {
      if (location.hash.length < 2) return null;
      const target = document.getElementById(location.hash.substr(1));
      if (target && target.classList.contains("modal")) return target;
    },
    focusableElements = "a, button, input, select, textarea";
    getFocusable = () => document.querySelectorAll(focusableElements);
    checkHash = () => {
      if (location.hash.length > 1) {
        let target = getHashModal();
        if (target) {
          modalDepth++;
          for (const e of getFocusable()) {
            e.tabIndex = (
              e.closest(".modal") === target ?
              e.dataset.originalTabIndex :
              -1
            );
          }
          const first = target.querySelector("input, select, textarea");
          if (first) first.focus();
          else if (document.activeElement) document.activeElement.blur();
          return;
        }
      }
      for (const e of getFocusable()) e.tabIndex = (
        e.closest(".modal") ?
        -1 :
        e.dataset.originalTabIndex
      );
    }; // checkHash
    
  Object.defineProperty(document, "__defineOriginalHashes", {
    value : () => {
      for (const e of getFocusable()) {
        if (e.dataset.originalTabIndex === undefined) {
          e.dataset.originalTabIndex = e.tabIndex || 0;
        }
      }
      checkHash();
    }
  } );
  
  addEventListener("hashchange", checkHash);
  checkHash();
  modalDepth = 0;
  
  const
    modalClose = (e) => {
      e.preventDefault();
      if (modalDepth) {
        do {
          history.back();
        } while (--modalDepth);
      } else location.hash = "#";
    };
  
  /* remember, keypress won't return escape! */
  document.addEventListener("keydown", (e) => {
    const target = getHashModal();
    if (!target || (e.key !== "Escape")) return;
    modalClose(e);
  });
  
  for (let a of document.querySelectorAll("[class^=modalClose]")) {
    a.addEventListener("click", modalClose);
  }
  
}  // modal helpers