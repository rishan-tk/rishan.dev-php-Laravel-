// ─── Tux ASCII art ───────────────────────────────────────────────────────────
// Small tier  (< 640px)   — 3 variants
// Medium tier (640–1199px) — 3 variants (incl. shared Linux logo)
// Large tier  (≥ 1200px)  — 3 variants (incl. shared Linux logo)

// ── Small tier ───────────────────────────────────────────────────────────────

// jgs slim Tux
const SMALL_1 = [
  '              a8888b.',
  '             d888888b.',
  '             8P"YP"Y88',
  '             8|o||o|88',
  "             8'    .88",
  "             8`._.' Y8.",
  '            d/      `8b.',
  '           dP   .    Y8b.',
  '          d8:\'  "  `::88b',
  '         d8"         \'Y88b',
  '        :8P    \'      :888',
  '         8a.   :     _a88P',
  '       ._/"Yaa_:   .| 88P|',
  '  jgs  \\    YP"    `| 8P  `.',
  '  a:f  /     \\.___.d|    .\'',
  "       `--..__)8888P`._.'",
];

// jgs fat Tux
const SMALL_2 = [
  '              a8888b.',
  '             d888888b.',
  '             8P"YP"Y88',
  '             8|o||o|88',
  "             8'    .88",
  "             8`._.' Y8.",
  '            d/      `8b.',
  '          .dP   .     Y8b.',
  '         d8:\'   "   `::88b.',
  '        d8"           `Y88b',
  '       :8P     \'       :888',
  '        8a.    :      _a88P',
  '      ._/"Yaa_ :    .| 88P|',
  '      \\    YP"      `| 8P  `.',
  '      /     \\._____d|    .\'',
  "      `--..__)888888P`._.'",
];

// blob Tux
const SMALL_3 = [
  '           _..._',
  "         .'     '.",
  '        /  _   _  \\',
  '        | (o)_(o) |',
  '         \\(     ) /',
  "         //'._.'\\  \\",
  '        //   .   \\ \\',
  '       ||   .     \\ \\',
  '       |\\   :     / |',
  "       \\ `) '   (`  /_",
  '     _)`".____,.\'"` (_',
  "     )     )'--'(     (",
  "      '---`      `---`",
];

// ── Medium tier ───────────────────────────────────────────────────────────────

// miK dot-art Tux
const MEDIUM_1 = [
  '                 .88888888:.',
  '                88888888.88888.',
  '              .8888888888888888.',
  '              888888888888888888',
  "              88' _`88'_  `88888",
  '              88 88 88 88  88888',
  '              88_88_::_88_:88888',
  '              88:::,::,:::::8888',
  "              88`:::::::::'`8888",
  "             .88  `::::'    8:88.",
  '            8888            `8:888.',
  "          .8888'             `888888.",
  "         .8888:..  .::.  ...:'8888888:.",
  "        .8888.'     :'     `'::`88:88888",
  "       .8888        '         `.888:8888.",
  '      888:8         .           888:88888',
  '    .888:88        .:           888:88888:',
  '    8888888.       ::           88:888888',
  "    `.::.888.      ::          .88888888",
  "   .::::::.888.    ::         :::`8888'.:.  ",
  "  ::::::::::.888   '         .::::::::::::",
  "  ::::::::::::.8    '      .:8:::::::::::.",
  ' .::::::::::::::.        .:888::::::::::::',
  " :::::::::::::::88:.__..:88888:::::::::::'",
  "  `'.:::::::::::88888888888.88:::::::::'",
  "       `':::_:' -- '' -'-' `':_::::'`",
];

// rs plane + Tux
const MEDIUM_2 = [
  '               .888888:.',
  '               88888.888.       ..ooo00000oo..',
  '              .8888888888    000000000000000000oo..       ..oo00',
  "              8' `88' `888   0000''' |  /'''00000000000000000000",
  "        HH    8 8 88 8 888   000     | /    00    \\  ''00''  000",
  ' HI     |H    8:.,::,.:888   000     |/     00     \\ ________000',
  ' HH,    |H   .8`::::::`888   000___    /|   00    /   \\      000',
  ' |HH,   |H   88  `::`  888   000  /   / |   00----____/      000',
  ' | HH,  HH  .88        `888. 000 /   /  |   00   /    \\      000',
  " |  YHHHHH.88'   .::.  .:8888.00..ooo0000oo.00  /      \\     000",
  "  \\    YHH888.'   :'    `'88:88.0000000000000000oo..    \\ ..o000",
  "   \\==/ .8888'    '        88:88.'  \\  |  ''00000000000000000000",
  '    == .8888H,    .        88:888    \\ |    00    \\   \'\'   / 000',
  "       `8888HH,   :        8:888'     \\|    00___  \\  /   /  000",
  "        `.:.8HH,  .       .::888'------o----00  /   \\/   /___000",
  '       .:::::88H  `      .:::::::.     /\\   00 /             000',
  '      .::::::.8         .:::::::::    /  \\  00/    /|   |\\   000',
  "      :::::::::..     .:::::::::'..oo00oo.. 00  /|/ |   | \\  000",
  '       `:::::::::88888:::::::\'00000000000000000oo.. |   | ..oo00',
  "          rs`:::\'       `:'  000\'\'\'      \'\'\'00000000000000000000",
  "                                                   ''00''",
];

// ── Shared: Linux logo (used in both medium and large) ────────────────────────

const LINUX_LOGO = [
  '                                                                 #####',
  '                                                                #######',
  '                   #                                            ##O#O##',
  '  ######          ###                                           #VVVVV#',
  '    ##             #                                          ##  VVV  ##',
  '    ##         ###    ### ####   ###    ###  ##### #####     #          ##',
  '    ##        #  ##    ###    ##  ##     ##    ##   ##      #            ##',
  '    ##       #   ##    ##     ##  ##     ##      ###        #            ###',
  '    ##          ###    ##     ##  ##     ##      ###       QQ#           ##Q',
  '    ##       # ###     ##     ##  ##     ##     ## ##    QQQQQQ#       #QQQQQQ',
  '    ##      ## ### #   ##     ##  ###   ###    ##   ##   QQQQQQQ#     #QQQQQQQ',
  '  ############  ###   ####   ####   #### ### ##### #####   QQQQQ#######QQQQQ',
];

// ── Large tier ────────────────────────────────────────────────────────────────

// Larry Ewing M-style (complete)
const LARGE_1 = [
  '                         4MMMMMMMMMMMML',
  '                       4MMMMMMMMMMMMMMMML',
  '                      MMMMMMMMMMMMMMMMMMML',
  '                     4MMMMMMMMMMMMMMMMMMMMM',
  '                    4MMMMMMMMMMMMMMMMMMMMMML',
  '                    MMMMP   MMMMMM   MMMMMMM',
  '                    MMMM MM  MMM  MM  MMMMMM',
  '                    MMMM MM  MMM  MM  MMMMML',
  '                     MMM MP,,,,,,,MM  MMMMMM',
  '                      MM,"          "MMMMMMP',
  "                      MMw           'MMMMMM",
  '                      MM"w         w MMMMMMML',
  '                      MM" w       w " MMMoMMML',
  '                     MMM " wwwwwww "  MMMMMMML',
  '                   MMMP   ".,,,,,,"     MMMMMMMML',
  '                  MMMP                    MMMMMMMML',
  '                MMMMM                      MMMMMMMML',
  "              MMMMM,,-''             ''-,,MMMMMMMMML",
  '             MMMMM                          MMMMMMMMML',
  '            MMMMM                            MMMMMMMMML',
  '           MMMMM                             MMMMMMMMMM',
  '           MMMM                               MMMMMMMMMM',
  '          MMMMM                               MMMMMMMMMML',
  '         MMMMM                                MMMMMMMMMMM',
  '         MMMMMM                               MMMMMMMMMMM',
  '         MMMMMMM                               MMMMMMMMMMM',
  '         """"MMMM                             MMMMMMMMMMP',
  '        "     ""MMM                            MMMMMMMMP',
  '   "" "         "MMMMMM                      """"MMMMMP"""',
  ' "               "MMMMMMM                   ""   """"""   "',
  ' "                ""MMMMMM                 M"             " ""',
  '  "                 "                   MMM"                  "',
  ' "                   "M               MMMM"                   "',
  ' "                    "MM        MMMMMMMMM"                ""',
  ' "                    "MMMMMMMMMMMMMMMMMMM"              """',
  '  """"                "MMMMMMMMMMMMMMMMMM"           """"',
  '      """"""""       MMMMM               "        ""',
  '              """"""""                      """""""',
];

// Larry Ewing shaded/oo style (complete)
const LARGE_2 = [
  '                         ooMMMMMMMooo',
  '                       oMMMMMMMMMMMMMMMoo',
  '                      MMMMMMMMMMMMMMo"MMMo',
  '                     "MMMMMMMMMMMMMMMMMMMMM',
  '                     MMMMMMMMMMMMMMMMMMMMMMo',
  '                     MMMM""MMMMMM"o" MMMMMMM',
  '                     MMo o" MMM"  oo ""MMMMM',
  '                     MM MMo MMM" MMoM "MMMMM',
  '                     MMo"M"o" "" MMM" oMMMMM"',
  '                     oMM M  o" " o "o MMMMMM"',
  '                     oM"o " o "  o "o MMMMMMM',
  '                     oMMoM o " M M "o MMMM"MMo',
  '                      Mo " M "M "o" o  MMMoMMMo',
  '                     MMo " "" M "       MMMMMMMo',
  '                   oMM"   "o o "         MMMMMMMM',
  '                  MMM"                    MMMMMMMMo',
  '                oMMMo                     "MMMMMMMMo',
  '               MMMMM o             "  " o" "MMMMMMMMMo',
  '              MMMMM          "            " "MMMMMMMMMo',
  '             oMMMM                          ""MMMMMMMMMo',
  '            oMMMM         o         o         MMoMMMMMMM',
  '            MMMM               o              "MMMMMMMMMM',
  '           MMMM"     o    o             o     "MMMMMMMMMMo',
  '         oMMMMM                                MMMMMMMMMMo',
  '         MMM"MM                               "MMM"MMMMMMM',
  '         MMMMMM           "      o   "         MMMMMMMMMMM',
  '         "o  "ooo    o                     o o"MMMMMMMMoM"',
  '        " o "o "MMo       "                o"  MMMMMMMM"',
  '    o "o" o o "  MMMo                     o o""""MMMM"o" "',
  ' " o "o " o o" "  MMMMoo         "       o "o M"" M "o " "',
  ' "o o"  " o o" " " "MMMM"   o              M o "o" o" o" " o',
  ' M  o M "  o " " " " MM""           o    oMo"o " o o "o " "o "',
  ' o"  o " "o " " M " " o                MMMMo"o " o o o o" o o" "',
  ' o" "o " o " " o o" M "oo         ooMMMMMMM o "o o o " o o o "',
  ' M "o o" o" "o o o " o"oMMMMMMMMMMMMMMMMMMMo" o o "o "o o"',
  '  "" "o"o"o"o o"o "o"o"oMMMMMMMMMMMMMMMMMMo"o"o "o o"oo"',
  '        "" M Mo"o"oo"oM"" "               MMoM M M M',
  '               """ """                      " """ "',
];

// ── Tier arrays ───────────────────────────────────────────────────────────────

export const TIER_SMALL  = [SMALL_1, SMALL_2, SMALL_3];
export const TIER_MEDIUM = [MEDIUM_1, MEDIUM_2, LINUX_LOGO];
export const TIER_LARGE  = [LARGE_1, LARGE_2, LINUX_LOGO];
