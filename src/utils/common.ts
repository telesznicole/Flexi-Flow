export function base(url: string) {
  return `${import.meta.env.BASE_URL}${url}`.replace(/\/\//g, '/')
}
