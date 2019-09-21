'use strict';
module.exports = function (grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    less: {
      dist: {
        options: {
          strictMath: true,
          sourceMap: true,
          outputSourceFiles: true,
          sourceMapURL: '<%= pkg.name %>.css.map',
          sourceMapFilename: 'dist/css/<%= pkg.name %>.css.map'
        },
        src: 'src/less/colorpicker.less',
        dest: 'dist/css/<%= pkg.name %>.css'
      }
    },
    cssmin: {
      options: {
        compatibility: 'ie8',
        keepSpecialComments: '*',
        sourceMap: true,
        advanced: false
      },
      dist: {
        src: 'dist/css/<%= pkg.name %>.css',
        dest: 'dist/css/<%= pkg.name %>.min.css'
      }
    },
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      files: [
        'Gruntfile.js_',
        'docs/docs.js_',
        'dist/js_/<%= pkg.name %>.js_'
      ]
    },
    jsbeautifier: {
      options: {
        js: {
          braceStyle: "collapse",
          breakChainedMethods: false,
          e4x: false,
          evalCode: false,
          indentChar: " ",
          indentLevel: 0,
          indentSize: 2,
          indentWithTabs: false,
          jslintHappy: false,
          keepArrayIndentation: false,
          keepFunctionIndentation: false,
          maxPreserveNewlines: 2,
          preserveNewlines: true,
          spaceBeforeConditional: true,
          spaceInParen: false,
          unescapeStrings: false,
          wrapLineLength: 0,
          endWithNewline: true
        }
      },
      src: ['src/js_/*.js_', 'docs/docs.js_'],
      dist: ['dist/js_/<%= pkg.name %>.js_']
    },
    combine: {
      js: {
        input: 'src/js_/colorpicker-plugin-wrapper.js_',
        output: 'dist/js_/<%= pkg.name %>.js_',
        tokens: [{
          token: "//@version",
          string: '<%= pkg.version %>'
        }, {
          token: "//@colorpicker-color",
          file: 'src/js_/colorpicker-color.js_'
        }, {
          token: "//@colorpicker-defaults",
          file: 'src/js_/colorpicker-defaults.js_'
        }, {
          token: "//@colorpicker-component",
          file: 'src/js_/colorpicker-component.js_'
        }]
      },
      less: {
        input: 'src/less/colorpicker.less',
        output: 'src/less/colorpicker.less',
        tokens: [{
          token: "//@version",
          string: '<%= pkg.version %>'
        }]
      }
    },
    strip_code: {
      src: {
        src: 'dist/js_/*.js_'
      }
    },
    uglify: {
      options: {
        banner: '/*!\n * Bootstrap Colorpicker v<%= pkg.version %>\n' +
        ' * https://itsjavi.com/bootstrap-colorpicker/\n */\n'
      },
      dist: {
        files: {
          'dist/js/<%= pkg.name %>.min.js': [
            'dist/js_/<%= pkg.name %>.js_'
          ]
        }
      }
    },
    watch: {
      less: {
        files: [
          'src/less/*.less'
        ],
        tasks: ['combine:less', 'less', 'cssmin']
      },
      js: {
        files: [
          'src/js_/*.js_',
          'docs/docs.js_'
        ],
        tasks: ['jsbeautifier:src', 'combine:js_', 'jsbeautifier:dist', 'uglify', 'jshint']
      },
      handlebars: {
        files: [
          'docs/*.hbs',
          'docs/**/*.hbs',
          'docs/helpers/**/*.js_'
        ],
        tasks: ['assemble']
      }
    },
    assemble: {
      options: {
        assets: 'docs/assets',
        helpers: ['docs/helpers/code'],
        partials: ['docs/includes/**/*.hbs'],
        layout: ['docs/layout.hbs'],
        data: ['package.json'],
        flatten: true
      },
      site: {
        src: ['docs/pages/*.hbs'],
        dest: './'
      }
    },
    clean: {
      dist: [
        'dist/css/*',
        'dist/js_/*',
        'index_new.html'
      ]
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-jsbeautifier');
  grunt.loadNpmTasks('grunt-combine');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-assemble');
  grunt.loadNpmTasks('grunt-strip-code');

  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'combine:less',
    'less',
    'cssmin',
    'jsbeautifier:src',
    'combine:js_',
    'jsbeautifier:dist',
    'strip_code',
    'uglify',
    'assemble',
    'jshint'
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};
