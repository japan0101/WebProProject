const { createProxyMiddleware } = require('http-proxy-middleware');

module.exports = function (req, res, next) {
  // Proxy requests to PHP server
  createProxyMiddleware({
    target: 'http://localhost:8000', // Replace with your PHP server URL
    changeOrigin: true,
    pathRewrite: { '^/api': '' }
  })(req, res, next);
};