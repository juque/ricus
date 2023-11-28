export default function sharedFuncions() {

  const sanitizeTags = (tags) => {
    const re = /\s+|,\s*/;
    return tags.split(re).filter(tag => tag !== '');
  }

  return {
    sanitizeTags
  }
}
