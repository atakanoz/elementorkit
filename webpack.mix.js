const mix = require('laravel-mix');
const StyleLintPlugin = require('stylelint-webpack-plugin');
mix
	.setPublicPath('./assets/dist');

mix
	.sass(
		'assets/src/styles/main.scss',
		'styles.bundle.css',
		{ sassOptions: { outputStyle: 'compressed' } }
	)
	.options({
		postCss: [
			require('css-declaration-sorter')({
				order: 'smacss'
			})
		],
		autoprefixer: {
			options: {
				browsers: [
					'last 6 versions',
				]
			}
		}
	});

mix
	.combine(
		['assets/src/scripts/*.js'],
		'assets/dist/scripts.bundle.js'
	);

mix
	.options({
		processCssUrls: false,
		postCss: [
			require('postcss-nested-ancestors'),
			require('postcss-nested'),
			require('postcss-import'),
			require('tailwindcss'),
			require('autoprefixer'),
		]
	});

mix
	.webpackConfig({
		plugins: [
			new StyleLintPlugin({
				files: './assets/src/styles/**/*.scss',
				configFile: './.stylelintrc'
			}),
		],
	});

mix
	.browserSync({
		proxy: 'http://localhost:8888',
		open: 'external',
		port: 3000,
		files: ['*.php', 'includes/**/*.php', 'assets/src/**/**/*']
	});

mix
	.disableNotifications();

mix
	.version();
