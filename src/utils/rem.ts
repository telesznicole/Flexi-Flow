export function setRem() {
  const onResize = () => {
    const innerWidth = window.innerWidth;
    const ratio = innerWidth <= 500 ? 1 : innerWidth <= 1000 ? 2 : 3;
    const fontSize = 16 * (innerWidth / (295 * ratio));
    document.documentElement.style.fontSize = `${fontSize}px`;
  }

  window.addEventListener('resize', onResize)
  window.addEventListener('orientationchange', onResize)
  onResize()
}
