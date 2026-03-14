# 2D Platformer — Graphics Module

**Stack:** C++, OpenGL, GLSL, Qt

A 2D platformer game built using OpenGL for GPU-accelerated rendering as part of the Graphics 1 module at UEA.

## Features

- Custom sprite rendering pipeline using GLSL shaders
- Tile-based level system loaded from text files
- Physics: gravity, collision detection, jump mechanics
- Animated sprites with sprite sheet support
- Parallax scrolling background layers

## Technical Highlights

The rendering pipeline was built from scratch — no game engine. Sprites are rendered as textured quads via a custom VAO/VBO setup. The collision system uses AABB (axis-aligned bounding box) detection.

## Academic Context

Graded for rendering quality, code architecture, and performance. Achieved distinction.
